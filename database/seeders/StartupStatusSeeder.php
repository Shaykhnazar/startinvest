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
            StartupStatus::query()->updateOrCreate([
                'name' => $status->value,
            ], [
                'name' => $status->value,
                'label' => $status->label(),
            ]);
        }

        // Optionally, delete any statuses not in the enum
        StartupStatus::query()->whereNotIn('name', StartupStatusEnum::values())->delete();
    }
}
