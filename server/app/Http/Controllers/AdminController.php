<?php

namespace App\Http\Controllers;

use App\Components\Auth\AdminStatus;
use App\Events\AdminDeleted;
use App\Events\AdminRegistered;
use App\Models\Admin;
use App\Repositories\AdminRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class AdminController extends Controller
{
    public function index(AdminRepository $adminRepository)
    {
        return view('admins.list', [
            'admins' => $adminRepository->list(),
            'statuses' => AdminStatus::all(),
        ]);
    }

    public function view()
    {

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

    public function update()
    {

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
