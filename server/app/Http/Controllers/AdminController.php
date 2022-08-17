<?php

namespace App\Http\Controllers;

use App\Repositories\AdminRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(AdminRepository $adminRepository)
    {
      //  dd($adminRepository->getStatuses());

        return view('admins.list', [
            'admins' => $adminRepository->list(),
            'statuses' => $adminRepository->getStatuses(),
        ]);
    }

    public function view()
    {

    }

    public function update()
    {

    }
}
