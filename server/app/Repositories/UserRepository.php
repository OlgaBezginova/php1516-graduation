<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    public function list()
    {
        return User::get();
    }

    public function byId($id)
    {
        return User::find($id);
    }

    public function byEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function createToken($user)
    {
        return DB::table('user_session_token')->updateOrInsert(
            [
                'user_id' => $user->id,
                'token' => Hash::make(uniqid(16)),
            ]
        );
    }

    public function tokenByUserId($id)
    {
        return DB::table('user_session_token')->select('token')->where('user_id', $id)->first();
    }

    public function byToken($token)
    {
        return DB::table('users')
            ->select('users.*')
            ->join('user_session_tokens', function(JoinClause $join) use ($token) {
                $join->on('users.id', '=', 'user_session_tokens.user_id')
                    ->where('user_session_tokens.token', $token);
            })->first();
    }
}
