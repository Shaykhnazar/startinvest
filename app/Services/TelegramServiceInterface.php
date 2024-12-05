<?php

namespace App\Services;

interface TelegramServiceInterface
{
    /**
     * Send a message via Telegram.
     *
     * @param array $params
     * @return mixed
     */
    public function sendMessage(array $params);
}
