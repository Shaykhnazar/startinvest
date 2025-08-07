<?php

namespace App\Notifications;

use App\Models\Investment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestmentCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Investment $investment
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New Investment Proposal Received')
                    ->greeting('Hello ' . $notifiable->name . '!')
                    ->line('You have received a new investment proposal for your startup.')
                    ->line('Startup: ' . $this->investment->startup->title)
                    ->line('Investor: ' . $this->investment->investor->name)
                    ->line('Amount: ' . $this->formatCurrency($this->investment->amount, $this->investment->currency))
                    ->action('View Investment', route('investments.show', $this->investment))
                    ->line('Please review the proposal and respond accordingly.')
                    ->line('Thank you for using Startinvest.uz!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [
            'type' => 'investment_created',
            'investment_id' => $this->investment->id,
            'startup_id' => $this->investment->startup_id,
            'investor_id' => $this->investment->investor_id,
            'amount' => $this->investment->amount,
            'currency' => $this->investment->currency,
            'message' => 'New investment proposal from ' . $this->investment->investor->name,
        ];
    }

    private function formatCurrency(?float $amount, ?string $currency = 'USD'): string
    {
        $symbols = [
            'USD' => '$',
            'EUR' => '€',
            'UZS' => 'UZS ',
            'RUB' => '₽',
        ];

        $symbol = $symbols[$currency] ?? $currency;
        
        return $symbol . number_format($amount, 2);
    }
}