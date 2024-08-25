<?php

namespace App\Enums;

enum JoinRequestStatusEnum: string
{
    case PENDING = 'PENDING';
    case CANCELED = 'CANCELED';
    case ACCEPTED = 'ACCEPTED';
    case REJECTED = 'REJECTED';
    case LEAVED = 'LEAVED';

    public static function values(): array
    {
        return [
            self::PENDING,
            self::CANCELED,
            self::ACCEPTED,
            self::REJECTED,
            self::LEAVED,
        ];
    }
}
