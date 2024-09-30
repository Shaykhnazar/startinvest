<?php

namespace App\Notifications;

use App\Mail\JoinRequestSent;
use App\Models\StartupJoinRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class JoinRequestNotification extends Notification
{
    use Queueable;

    public $joinRequest;
    public $message;

    public function __construct(StartupJoinRequest $joinRequest, $message)
    {
        $this->joinRequest = $joinRequest;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // or 'telegram' if you're using that channel
    }

    public function toMail($notifiable)
    {
        return (new JoinRequestSent($this->joinRequest))->to($notifiable->email);
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'joinRequest' => $this->joinRequest->toArray(),
        ];
    }
}
