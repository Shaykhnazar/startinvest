<?php

namespace App\Jobs;

use App\Models\Startup;
use App\Models\StartupPublication;
use App\Services\StartupService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Enums\SocialMediaEnum;
use Carbon\Carbon;

class PublishStartupToSocialMediaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 5; // Set a higher number of attempts if needed
    public int $backoff = 60; // Backoff time in seconds
    public int $timeout = 300; // Timeout in seconds

    protected Startup $startup;

    public function __construct(Startup $startup)
    {
        $this->startup = $startup;
    }

    /**
     * Handle the job to publish the startup to selected social media platforms.
     */
    public function handle()
    {
        try {
            // Fetch startup publication record
            $publication = StartupPublication::where('startup_id', $this->startup->id)->first();

            if (!$publication) {
                Log::warning('No publication record found for startup: ' . $this->startup->id);
                return;
            }

            // Iterate through each platform defined in SocialMediaEnum and publish if set to false
            foreach (SocialMediaEnum::all() as $platformName) {
                // Get the column in the publication table (same name as platform)
                if ($publication->{$platformName} === false) {
                    // Dispatch the command to publish
                    StartupService::publishOnMedia($this->startup, $platformName);

                    // Update the platform's column to true (mark as published)
                    $publication->{$platformName} = true;
                    $publication->published_at = Carbon::now();
                } elseif ($publication->{$platformName} === null) {
                    // If the platform is null, skip publishing
                    Log::info("Skipping publishing to {$platformName} as it's set to null.");
                }
            }

            // Save the publication record with updated statuses
            $publication->save();
        } catch (\Exception $e) {
            // Handle other exceptions
            Log::error('Error in PublishStartupToSocialMedia job: ' . $e->getMessage());
        }
    }

}
