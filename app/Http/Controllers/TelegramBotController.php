<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotController extends Controller
{
    public function handle(Request $request)
    {
        $update = Telegram::getWebhookUpdate();

//        Log::info('update', [$update]);

    }

    public function handleInstaTrack(Request $request)
    {
        $update = Telegram::bot('instaProfileTrackerBot')->getWebhookUpdate();

//        Log::info('update', [$update]);

    }
}
