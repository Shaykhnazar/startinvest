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
        return __('site.enums.join_request_status.' . strtolower($this->value));
    }

    public static function options(): array
    {
        return array_map(fn($status) => [
            'value' => $status->value,
            'label' => $status->label(),
        ], self::cases());
    }
}
