<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\StartupStatusEnum;
use App\Models\StartupStatus;

class StartupStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (StartupStatusEnum::cases() as $status) {
            // Generate labels for all supported locales
            $localizedLabels = $this->getLocalizedLabels($status);

            StartupStatus::query()->updateOrCreate([
                'name' => $status->value,
            ], [
                'name' => $status->value,
                'label' => $localizedLabels,
            ]);
        }

        // Optionally, delete any statuses not in the enum
        StartupStatus::query()->whereNotIn('name', StartupStatusEnum::values())->delete();
    }

    /**
     * Get localized labels for all supported locales.
     */
    private function getLocalizedLabels(StartupStatusEnum $status): array
    {
        $locales = config('app.supported_locales', ['en', 'ru', 'uz_Latn']);
        $localizedLabels = [];

        foreach ($locales as $locale) {
            $localizedLabels[$locale] = $status->labelForLocale($locale);
        }

        return $localizedLabels;
    }
}
