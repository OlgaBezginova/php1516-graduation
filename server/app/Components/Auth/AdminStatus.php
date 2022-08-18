<?php

namespace App\Components\Auth;

class AdminStatus
{
    const
        ACTIVE = 1,
        NEW = 2,
        DISABLED = 3;

    public static function all()
    {
        return [
                self::ACTIVE => 'Active',
                self::NEW => 'New',
                self::DISABLED => 'Disabled',
        ];
    }
}
