<?php

namespace App\Mail;

use App\Enums\JoinRequestStatusEnum;
use App\Models\StartupJoinRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JoinRequestAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $joinRequest;
    public $toStatus;

    public function __construct(StartupJoinRequest $joinRequest, $toStatus)
    {
        $this->joinRequest = $joinRequest;
        $this->toStatus = $toStatus;
    }

    public function build()
    {
        $view = $this->toStatus === JoinRequestStatusEnum::REJECTED->value ? 'emails.join_request_rejected' : 'emails.join_request_accepted';
        $subject = $this->toStatus === JoinRequestStatusEnum::REJECTED->value ? 'Jamoaga qabul qilish so\'rovi rad etildi' : 'Jamoaga qabul qilish so\'rovi qabul qilindi';

        return $this->view($view)
            ->subject($subject)
            ->with(['joinRequest' => $this->joinRequest]);
    }
}
