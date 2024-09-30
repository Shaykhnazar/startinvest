<?php

namespace App\Mail;

use App\Models\StartupJoinRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JoinRequestSent extends Mailable
{
    use Queueable, SerializesModels;

    public $joinRequest;

    public function __construct(StartupJoinRequest $joinRequest)
    {
        $this->joinRequest = $joinRequest;
    }

    public function build()
    {
        return $this->view('emails.join_request_sent')
            ->subject('Startup bo\'yicha yangi so\'rov yuborildi')
            ->with(['joinRequest' => $this->joinRequest]);
    }
}
