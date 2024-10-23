<?php

namespace App\Services\Publisher\Strategies;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

class TelegramPublisher extends BaseSocialMediaPublisher
{
    public function publish(): void
    {
        try {
            $telegram = new Api(config('services.telegram.token'));

            // Escape markdown text
            $title = $this->escapeMarkdown($this->startup->title);
            $url = route('startups.show', $this->startup->id);

            $message = "📢 Navbatdagi startup loyiha:\n";
            $message .= "🚀 *{$title}*\n\n";

            $telegram->sendMessage([
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => $message,
                'parse_mode' => 'MarkdownV2',
                'reply_markup' => json_encode([
                    'inline_keyboard' => [[[ 'text' => '🔗 Platformada batafsil tanishish', 'url' => $url ]]]
                ]),
            ]);
        } catch (TelegramSDKException $e) {
            Log::error('Telegram API Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error in TelegramPublisher: ' . $e->getMessage());
        }
    }

    private function escapeMarkdown($text)
    {
        $special_chars = ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!'];
        foreach ($special_chars as $char) {
            $text = str_replace($char, '\\' . $char, $text);
        }
        return $text;
    }
}
