<?php

namespace App\Observers;

use App\Jobs\PublishStartupToSocialMedia;
use App\Jobs\SendStartupNotificationJob;
use App\Models\Startup;

class StartupObserver
{
    /**
     * Handle the Startup "created" event.
     */
    public function created(Startup $startup): void
    {
        // Dispatch the job to send the notification
        SendStartupNotificationJob::dispatch($startup);
    }

    /**
     * Handle the Startup "updated" event.
     */
    public function updated(Startup $startup): void
    {
        if ($startup->isDirty('verified') && $startup->verified && $startup->public()) {
            // Dispatch a job to publish to social media
            PublishStartupToSocialMedia::dispatch($startup);
        }
    }

    /**
     * Handle the Startup "deleted" event.
     */
    public function deleted(Startup $startup): void
    {
        //
    }

    /**
     * Handle the Startup "restored" event.
     */
    public function restored(Startup $startup): void
    {
        //
    }

    /**
     * Handle the Startup "force deleted" event.
     */
    public function forceDeleted(Startup $startup): void
    {
        //
    }
}
