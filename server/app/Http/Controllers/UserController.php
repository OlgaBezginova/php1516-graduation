<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;

class UserController extends Controller
{

    public function index(UserRepository $userRepository)
    {
        return view('users.list', ['users' => $userRepository->list()]);
    }

    public function view($id, UserRepository $userRepository)
    {
        if (!$user = $userRepository->byId($id)) {
            abort(404);
        }

        return view('users.user', ['user' => $user]);
    }

    public function create()
    {

    }

    public function add()
    {

    }

    public function update($id)
    {

    }


    public function edit($id)
    {

    }

    public function delete($id)
    {

    }

}
