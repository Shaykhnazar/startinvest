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

    public static function values(): array
    {
        return [
            self::ON_START->value,
            self::TEAM_BUILDING->value,
            self::PROGRESSING->value,
            self::RELEASE->value,
            self::TESTING->value,
            self::ON_PRODUCTION->value,
        ];
    }

    public function label(): string
    {
        return __('site.enums.startup_status.' . strtolower($this->value));
    }

    public static function options(): array
    {
        return array_map(fn($status) => [
            'value' => $status->value,
            'label' => $status->label(),
        ], self::cases());
    }


    /**
     * Get the label for a specific locale.
     */
    public function labelForLocale(string $locale): string
    {
        return __(
            'site.enums.startup_status.' . strtolower($this->value),
            [],
            $locale
        );
    }

    /**
     * Get all labels keyed by locale.
     */
    public function allLabels(): array
    {
        $locales = config('app.supported_locales', ['en', 'ru', 'uz_Latn']);
        $labels = [];
        foreach ($locales as $locale) {
            $labels[$locale] = $this->labelForLocale($locale);
        }
        return $labels;
    }
}
