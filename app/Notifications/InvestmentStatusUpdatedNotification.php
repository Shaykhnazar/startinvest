<?php

namespace App\Notifications;

use App\Models\Investment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestmentStatusUpdatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Investment $investment,
        public string $oldStatus
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
                    ->subject('Investment Status Updated')
                    ->greeting('Hello ' . $notifiable->name . '!')
                    ->line('The status of your investment has been updated.')
                    ->line('Startup: ' . $this->investment->startup->title)
                    ->line('Amount: ' . $this->formatCurrency($this->investment->amount, $this->investment->currency))
                    ->line('Previous Status: ' . ucfirst($this->oldStatus))
                    ->line('New Status: ' . $this->investment->getStatusLabel())
                    ->when($this->investment->status === 'approved', function ($mail) {
                        return $mail->line('🎉 Congratulations! Your investment has been approved.');
                    })
                    ->when($this->investment->status === 'active', function ($mail) {
                        return $mail->line('✅ Your investment is now active and earning returns.');
                    })
                    ->when($this->investment->status === 'completed', function ($mail) {
                        return $mail->line('🎯 Your investment has been completed successfully.');
                    })
                    ->when($this->investment->status === 'exited', function ($mail) {
                        $roi = $this->investment->calculateROI();
                        return $mail->line('📈 Investment exit completed with ROI of ' . round($roi, 2) . '%.');
                    })
                    ->action('View Investment Details', route('investments.show', $this->investment))
                    ->line('Thank you for using Startinvest.uz!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [
            'type' => 'investment_status_updated',
            'investment_id' => $this->investment->id,
            'startup_id' => $this->investment->startup_id,
            'old_status' => $this->oldStatus,
            'new_status' => $this->investment->status,
            'message' => "Investment status changed from {$this->oldStatus} to {$this->investment->status}",
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