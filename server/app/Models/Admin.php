<?php

namespace App\Models;

use App\Components\Auth\AdminStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    public function getStatusAttribute($value){
        $status = [
            AdminStatus::ACTIVE => 'Active',
            AdminStatus::NEW => 'New',
            AdminStatus::DISABLED => 'Disabled',
        ];

        return $status[$value];
    }

}
