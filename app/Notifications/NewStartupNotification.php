<?php

namespace App\Notifications;

use App\Models\Startup;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewStartupNotification extends Notification
{
    use Queueable;

    protected $startup;

    /**
     * Create a new notification instance.
     */
    public function __construct(Startup $startup)
    {
        $this->startup = $startup;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'/*, 'database'*/];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Startinvest.uz - Yangi startup qo\'shildi:' . $this->startup->title)
            ->line('Tizimga yangi startap qo\'shildi.')
            ->line('Startup: ' . $this->startup->title)
            ->action('Ko\'rish va e\'lon qilish', url('/admin/crud/view/startup-resources/'.$this->startup->id))
            ->line('Tizimda yangilik!');
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Tizimga yangi startap qo\'shildi:' . $this->startup->title,
            'startup' => $this->startup
        ];
    }
}
