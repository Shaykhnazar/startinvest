<?php

namespace App\Enums;

enum VoteTypeEnum
{
    case UP;
    case DOWN;

    public static function values(): array
    {
        return [self::UP->name, self::DOWN->name];
    }
}
