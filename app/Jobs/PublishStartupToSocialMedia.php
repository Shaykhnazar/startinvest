<?php

namespace App\Jobs;

use App\Models\Startup;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

class PublishStartupToSocialMedia implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $startup;

    public function __construct(Startup $startup)
    {
        $this->startup = $startup;
    }

    /**
     */
    public function handle()
    {
        try {
            $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

            // OPTION 1 - HTML formatting
//            $title = htmlspecialchars($this->startup->title, ENT_QUOTES, 'UTF-8');
//            $url = route('startups.show', $this->startup->id);
//
//            // Format the message using supported HTML tags
//            $message = "📢 Navbatdagi startup loyiha:\n\n";
//            $message .= "🚀 <b>{$title}</b>\n\n";
//            $message .= "<a href=\"{$url}\">Saytda batafsil tanishish</a>";
//
//            $telegram->sendMessage([
//                'chat_id' => env('TELEGRAM_CHAT_ID'),
//                'text' => $message,
//                'parse_mode' => 'HTML',
//            ]);

            // OPTION 2 - Markdown formatting
            $escapeMarkdown = function ($text) {
                $special_chars = ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!'];
                foreach ($special_chars as $char) {
                    $text = str_replace($char, '\\' . $char, $text);
                }
                return $text;
            };

            // Escape user-generated content
            $title = $escapeMarkdown($this->startup->title);
            $url = route('startups.show', $this->startup->id); // URLs don't need to be escaped

//            dd($url);
//            $url = $escapeMarkdown($url);

//            // Format the message using MarkdownV2 syntax
            $message = "📢 Navbatdagi startup loyiha:\n";
            $message .= "🚀 *{$title}*\n\n"; // Bold
//            $message .= "Loyiha haqida:\n> {$description}\n\n"; // Blockquote
//            $message .= "[Saytda batafsil tanishish]({$url})\n"; // Clickable link

            $telegram->sendMessage([
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => $message,
                'parse_mode' => 'MarkdownV2',
                'reply_markup' => json_encode([
                    'inline_keyboard' => [[[
                        'text' => '🔗 Platformada batafsil tanishish',
                        'url' => $url
                    ]]]
                ]),
            ]);
        } catch (TelegramSDKException $e) {
            // Log the error or handle it as needed
            Log::error('Telegram API Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Handle other exceptions
            Log::error('Error in PublishStartupToSocialMedia job: ' . $e->getMessage());
        }
    }
}
