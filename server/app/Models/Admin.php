<?php

namespace App\Models;

use App\Components\Auth\AdminStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    public function isVerified(): bool
    {
        return !empty($this->email_verified);
    }

    public function getStatusAttribute($value)
    {
        return AdminStatus::all()[$value];
    }
}
