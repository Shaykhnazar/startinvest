<?php

namespace App\Enums;

enum StartupTypeEnum: string
{
    case PRIVATE = 'private';
    case PUBLIC = 'public';

    public function label(): string
    {
        return __('site.enums.startup_type.' . strtolower($this->value));
    }

    public static function options(): array
    {
        return array_map(fn($type) => [
            'value' => $type->value,
            'label' => $type->label(),
        ], self::cases());
    }
}
