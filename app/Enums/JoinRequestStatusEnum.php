<?php

namespace App\Enums;

enum JoinRequestStatusEnum: string
{
    case PENDING = 'PENDING';
    case CANCELED = 'CANCELED';
    case ACCEPTED = 'ACCEPTED';
    case REJECTED = 'REJECTED';
    case LEAVED = 'LEAVED';

    public static function contributorOptions(): array
    {
        return [
            self::PENDING,
            self::LEAVED,
        ];
    }

    public static function ownerOptions(): array
    {
        return [
            self::ACCEPTED,
            self::REJECTED,
            self::CANCELED,
        ];
    }

    public function label(): string
    {
        return match($this) {
            self::PENDING => 'Jamoaga qo\'shilmoqchi',
            self::CANCELED => 'So\'rov bekor qilindi',
            self::ACCEPTED => 'Qabul qilish',
            self::REJECTED => 'Rad etish',
            self::LEAVED => 'Jamoani tark etmoqchi',
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
