<?php

namespace App\Services;

use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramService implements TelegramServiceInterface
{
    /**
     * {@inheritdoc}
     * @throws TelegramSDKException
     */
    public function sendMessage(array $params)
    {
        return Telegram::bot('instaProfileTrackerBot')->sendMessage($params);
    }
}
