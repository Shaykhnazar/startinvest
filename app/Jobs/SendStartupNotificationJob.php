<?php

namespace App\Jobs;

use App\Models\Startup;
use App\Models\User;
use App\Notifications\NewStartupNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendStartupNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $startup;

    /**
     * Create a new job instance.
     *
     * @param Startup $startup
     */
    public function __construct(Startup $startup)
    {
        $this->startup = $startup;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Find the admin user (assuming admin role or email is set in .env file)
        $admin = User::where('email', env('APP_ADMIN_MAIL'))->first();

        // Send the notification to the admin
        if ($admin) {
            $admin->notify(new NewStartupNotification($this->startup));
        }
    }
}
