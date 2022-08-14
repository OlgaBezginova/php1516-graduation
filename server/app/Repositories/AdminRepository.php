<?php

namespace App\Repositories;


use App\Models\Admin;

class AdminRepository
{

    public function list()
    {

    }

    public function byId($id)
    {
        return Admin::find($id);
    }

    public function create(array $data)
    {
        $admin = new Admin();
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->password = $data['password'];
        $admin->status = $data['status'];
        $admin->email_verification_token = $data['email_verification_token'];
        $admin->save();

        return $admin;
    }

}
