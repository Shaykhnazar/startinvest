<?php

namespace App\Notifications;

use App\Mail\JoinRequestAccepted;
use App\Models\StartupJoinRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AcceptRequestNotification extends Notification
{
    use Queueable;

    public $joinRequest;
    public $toStatus;
    public $message;


    public function __construct(StartupJoinRequest $joinRequest, $toStatus, $message)
    {
        $this->joinRequest = $joinRequest;
        $this->toStatus = $toStatus;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // or 'telegram' if you're using that channel
    }

    public function toMail($notifiable)
    {
        return (new JoinRequestAccepted($this->joinRequest, $this->toStatus))->to($notifiable->email);
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'joinRequest' => $this->joinRequest->toArray(),
        ];
    }
}
