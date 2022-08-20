<?php

namespace App\Components;

class OrderStatus
{
    const
        NEW = 1,
        PAID = 2,
        SENT = 3,
        COMPLETED = 4,
        CLOSED = 5;

    public static function all()
    {
        return [
            self::NEW => 'New',
            self::PAID => 'Paid',
            self::SENT => 'Sent',
            self::COMPLETED => 'Completed',
            self::CLOSED => 'Closed',
        ];
    }
}
