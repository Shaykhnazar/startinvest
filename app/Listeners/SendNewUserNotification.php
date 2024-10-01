<?php

namespace App\Listeners;

use App\Mail\NewUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewUserNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;

        // Send notification to the startinvest.uz email
        Mail::to(env('APP_ADMIN_MAIL'))->send(new NewUserRegistered($user));
    }
}
