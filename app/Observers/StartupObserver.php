<?php

namespace App\Observers;

use App\Jobs\PublishStartupToSocialMedia;
use App\Models\Startup;
use App\Models\User;
use App\Notifications\NewStartupNotification;

class StartupObserver
{
    /**
     * Handle the Startup "created" event.
     */
    public function created(Startup $startup): void
    {
        // Find the admin user (assuming admin role has an ID of 1)
        $admin = User::where('email', env('APP_ADMIN_MAIL'))->first();

        // Send the notification to the admin
        if ($admin) {
            $admin->notify(new NewStartupNotification($startup));
        }
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
