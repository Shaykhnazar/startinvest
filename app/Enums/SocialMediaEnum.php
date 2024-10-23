<?php

namespace App\Enums;

enum SocialMediaEnum: string
{
    case INSTAGRAM = 'instagram';
    case LINKEDIN = 'linkedin';
    case REDDIT = 'reddit';
    case TELEGRAM = 'telegram';

    /**
     * Get all available social media platforms.
     *
     * @return array
     */
    public static function all(): array
    {
        return [
            self::INSTAGRAM->value,
            self::LINKEDIN->value,
            self::REDDIT->value,
            self::TELEGRAM->value,
        ];
    }
}
