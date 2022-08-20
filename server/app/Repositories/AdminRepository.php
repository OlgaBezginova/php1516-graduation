<?php

namespace App\Repositories;


use App\Models\Admin;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class AdminRepository
{
    private $name;
    private $email;
    private $status;

    public function setNameFilter($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setEmailFilter($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setStatusFilter($status)
    {
        $this->status = $status;

        return $this;
    }

    public function list()
    {
        return Admin::when($this->name, function ($query){
            $query->where('name', 'LIKE', '%' . $this->name . '%');
        })->when($this->email, function ($query){
            $query->where('email', $this->email);
        })->when($this->status, function ($query){
            $query->where('status', $this->status);
        })->get();
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

    public function getByToken($token)
    {
        return Admin::where('email_verification_token', $token)->first();
    }

    public function delete(Admin $admin)
    {
        $admin->delete();
    }
}
