<?php

namespace App\Enums;

enum StartupTypeEnum: string
{
    case PRIVATE = 'private';
    case PUBLIC = 'public';

    public function label(): string
    {
        return match($this) {
            self::PRIVATE => 'keng jamoatchilik uchun yopiq',
            self::PUBLIC => 'barcha ko\'rishi mumkin',
        };
    }

    public static function options(): array
    {
        return array_map(fn($type) => [
            'value' => $type->value,
            'label' => $type->label(),
        ], self::cases());
    }
}
