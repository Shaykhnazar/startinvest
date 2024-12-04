<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Services\InstaProfileTrackBotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotController extends Controller
{
    public function __construct(protected InstaProfileTrackBotService $instaProfileTrackBotService) {}

    public function handle(Request $request)
    {
        $update = Telegram::getWebhookUpdate();

//        Log::info('update', [$update]);

    }

    public function handleInstaTrack(Request $request)
    {
        $update = Telegram::bot('instaProfileTrackerBot')->getWebhookUpdate();
        $message = $update->getMessage();

        if ($message) {
            $chatId = $message->get('chat')['id'] ?? null;
            $text = trim($message->get('text', ''));

            if (str_starts_with($text, '/start')) {
                $this->sendMessage($chatId, "👋 Welcome to the Instagram Profile Tracker Bot!\n\nUse /subscribe @username to start tracking an Instagram profile.\nUse /unsubscribe @username to stop tracking.");
            } elseif (preg_match('/^\/subscribe\s+([A-Za-z0-9._]{1,30})$/', $text, $matches)) {
                $username = $matches[1];
                $response = $this->instaProfileTrackBotService->subscribe($chatId, $username);
                $this->sendMessage($chatId, $response);
            } elseif (preg_match('/^\/unsubscribe\s+([A-Za-z0-9._]{1,30})$/', $text, $matches)) {
                $username = $matches[1];
                $response = $this->instaProfileTrackBotService->unsubscribe($chatId, $username);
                $this->sendMessage($chatId, $response);
            } elseif (str_starts_with($text, '/help')) {
                $this->sendMessage($chatId, "📚 <b>Help - Instagram Profile Tracker Bot</b>\n\nHere are the commands you can use:\n\n/start - Welcome message and instructions\n/help - Display this help message\n/subscribe @username - Start tracking an Instagram profile\n/unsubscribe @username - Stop tracking an Instagram profile");
            } elseif (str_starts_with($text, '/list')) {
                $subscriptions = Subscription::where('chat_id', $chatId)->get();

                if ($subscriptions->isEmpty()) {
                    $this->sendMessage($chatId, "📄 You have no active subscriptions.");
                } else {
                    $message = "📄 <b>Your Active Subscriptions:</b>\n\n";
                    foreach ($subscriptions as $subscription) {
                        $message .= "- @{$subscription->profile_username}\n";
                    }
                    $this->sendMessage($chatId, $message);
                }
            } else {
                $this->sendMessage($chatId, "❓ Sorry, I didn't understand that command. Use /help to see available commands.");
            }
        }

        return response('OK', 200);
    }

    private function sendMessage($chatId, $text)
    {
        Telegram::bot('instaProfileTrackerBot')->sendMessage([
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML',
        ]);
    }
}
