<?php

namespace App\Services\Publisher;

use App\Enums\SocialMediaEnum;
use App\Services\Publisher\Strategies\BaseSocialMediaPublisher;
use App\Services\Publisher\Strategies\InstagramPublisher;
use App\Services\Publisher\Strategies\LinkedInPublisher;
use App\Services\Publisher\Strategies\TelegramPublisher;
use Facebook\Exceptions\FacebookSDKException;

class SocialMediaPublisherFactory
{
    /**
     * @throws FacebookSDKException
     */
    public static function create($platform, $startup): BaseSocialMediaPublisher
    {
        return match ($platform) {
//            SocialMediaEnum::INSTAGRAM->value => new InstagramPublisher($startup),
            SocialMediaEnum::LINKEDIN->value => new LinkedInPublisher($startup),
            SocialMediaEnum::TELEGRAM->value => new TelegramPublisher($startup),
            default => throw new \InvalidArgumentException("Unsupported platform: $platform"),
        };
    }
}
