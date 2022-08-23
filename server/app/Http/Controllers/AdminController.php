<?php

namespace App\Http\Controllers;

use App\Components\Auth\AdminStatus;
use App\Events\AdminDeleted;
use App\Events\AdminRegistered;
use App\Events\AdminStatusChanged;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class AdminController extends Controller
{
    public function index(Request $request, AdminRepository $adminRepository)
    {
        $adminRepository->setNameFilter($request->get('name'));
        $adminRepository->setEmailFilter($request->get('email'));
        $adminRepository->setStatusFilter($request->get('status'));

        return view('admins.list', [
            'admins' => $adminRepository->list(),
            'statuses' => AdminStatus::all(),
        ]);
    }

    public function show($id, AdminRepository $adminRepository)
    {
        if (!$admin = $adminRepository->byId($id)) {
            abort(404);
        }

        return view('admins.admin', ['admin' => $admin]);
    }

    public function add()
    {
        return view('admins.add', ['statuses' => AdminStatus::all()]);
    }

    public function create(Request $request, AdminRepository $adminRepository)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password',
            'status' => 'nullable',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['email_verification_token'] = Hash::make($data['email']);
        $data['status'] = $data['status'] ?? AdminStatus::NEW;

        try {
            $admin = $adminRepository->create($data);
            AdminRegistered::dispatch($admin);
        } catch (Exception $e){

        }

        return redirect(route('admins.list'))->with('success', 'New admin ' . $admin->name . ' added');
    }

    public function edit($id, AdminRepository $adminRepository)
    {
        return view('admins.edit', [
            'admin' => $adminRepository->byId($id),
            'statuses' => AdminStatus::all(),
        ]);
    }

    public function update($id, Request $request, AdminRepository $adminRepository)
    {
        if (!$admin = $adminRepository->byId($id)) {
            abort(404);
        }

        $data = $request->validate([
            'name' => 'nullable',
            'password' => 'nullable|min:8',
            'password_confirm' => 'exclude_if:password,null|exclude_without:password|required|same:password',
            'status' => 'nullable',
        ],
        [
            'password_confirm.required' => 'The Confirm Password field is required.',
            'password_confirm.same' => 'The Confirm Password and Password must match.',
        ]);

        if (isset($data['name'])) {
            $admin->name = $data['name'];
        }

        if (isset($data['password'])) {
            $admin->password = Hash::make($data['password']);
        }

        if (isset($data['status'])) {
            $admin->status = $data['status'];
            AdminStatusChanged::dispatch($admin);
        }

        $admin->save();

        return redirect(route('admins.admin', ['id' => $id]))->with('success', 'Data was updated');
    }

    public function delete($id, AdminRepository $adminRepository)
    {
        if (!$admin = $adminRepository->byId($id)) {
            abort(404);
        }

        $email = $admin->email;

        $adminRepository->delete($admin);

        AdminDeleted::dispatch($email);

        return redirect(route('admins.list'))->with('success', 'Admin ' . $admin->name . ' deleted');
    }
}
