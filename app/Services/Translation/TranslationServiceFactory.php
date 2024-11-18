<?php

namespace App\Services\Translation;

class TranslationServiceFactory
{
    /**
     * @throws \Exception
     */
    public static function create(): TranslationServiceInterface
    {
        $service = config('services.translation.default');

        return match ($service) {
            'google' => new GoogleTranslateService(),
            default => throw new \Exception("Unsupported translation service: {$service}"),
        };
    }
}
