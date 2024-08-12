<?php

namespace App\Enums;

enum StartupStatusEnum: string
{
    case ON_START = 'on_start';
    case TEAM_BUILDING = 'team_building';
    case PROGRESSING = 'progressing';
    case RELEASE = 'release';
    case TESTING = 'testing';
    case ON_PRODUCTION = 'on_production';

    public function label(): string
    {
        return match($this) {
            self::ON_START => 'boshlanish fazasida',
            self::TEAM_BUILDING => 'jamoa tuzish bosqichida',
            self::PROGRESSING => 'ishlab chiqilyapti',
            self::RELEASE => '1-versiya tayyor',
            self::TESTING => 'sinov fazasida',
            self::ON_PRODUCTION => 'ishlab chiqilgan',
        };
    }

    public static function options(): array
    {
        return array_map(fn($status) => [
            'value' => $status->value,
            'label' => $status->label(),
        ], self::cases());
    }
}
