<?php

namespace App\Console\Commands;

use App\Services\InstaProfileTrackBotService;
use Illuminate\Console\Command;
use Telegram\Bot\Exceptions\TelegramSDKException;

class CheckInstagramProfiles extends Command
{
    protected $signature = 'instagram:check-profiles';
    protected $description = 'Check Instagram profiles for updates';

    public function __construct(protected InstaProfileTrackBotService $instaProfileTrackBotService)
    {
        parent::__construct();
    }

    /**
     * @throws TelegramSDKException
     */
    public function handle(): int
    {
        $this->instaProfileTrackBotService->checkAllSubscriptions();

        $this->info('Instagram profiles checked successfully.');

        return 0;
    }
}
