<?php

namespace App\Services;

use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Exceptions\TelegramSDKException;

class InstaProfileTrackBotService
{
    public function __construct(
        protected InstagramScraperService $instagramScraperService,
        protected TelegramServiceInterface $telegramService
    ) {}

    /**
     * Subscribe a user to an Instagram profile.
     *
     * @param int $chatId Telegram chat ID
     * @param string $username Instagram username
     * @return string Message to send to the user
     */
    public function subscribe(int $chatId, string $username): string
    {
        // Validate Instagram username format
        if (!$this->validateUsername($username)) {
            return "❌ Invalid Instagram username. Please provide a valid username.";
        }

        // Check if the subscription already exists
        $existing = Subscription::where('chat_id', $chatId)
            ->where('profile_username', $username)
            ->first();

        if ($existing) {
            return "⚠️ You are already subscribed to @{$username}.";
        }

        // Check if the Instagram profile exists
        $profileData = $this->instagramScraperService->fetchProfileStats($username);
        if (!$profileData) {
            return "❌ Unable to fetch data for @{$username}. Please ensure the username is correct and accessible.";
        }

        // Create the subscription
        Subscription::create([
            'chat_id' => $chatId,
            'profile_username' => $username,
            'status' => 'active',
            'last_known_followers' => $profileData['followers'],
            'last_known_following' => $profileData['following'],
            'last_known_posts' => $profileData['posts'],
        ]);

        return "✅ Successfully subscribed to @{$username}. You will be notified of any changes.";
    }

    /**
     * Unsubscribe a user from an Instagram profile.
     *
     * @param int $chatId Telegram chat ID
     * @param string $username Instagram username
     * @return string Message to send to the user
     */
    public function unsubscribe(int $chatId, string $username): string
    {
        $subscription = Subscription::where('chat_id', $chatId)
            ->where('profile_username', $username)
            ->first();

        if (!$subscription) {
            return "⚠️ You are not subscribed to @{$username}.";
        }

        $subscription->delete();

        return "✅ Successfully unsubscribed from @{$username}.";
    }

    /**
     * Fetch and update profile data for all active subscriptions.
     * Notify users of any changes.
     *
     * @return void
     * @throws TelegramSDKException
     */
    public function checkAllSubscriptions(): void
    {
        $subscriptions = Subscription::where('status', 'active')->get();

        foreach ($subscriptions as $subscription) {
            $stats = $this->instagramScraperService->fetchProfileStats($subscription->profile_username);

            if (!$stats) {
                Log::error("Failed to fetch stats for @{$subscription->profile_username}");
                continue;
            }

            $changes = [];

            if ($stats['followers'] !== $subscription->last_known_followers) {
                $changes[] = "👥 Followers: {$subscription->last_known_followers} → {$stats['followers']}";
                $subscription->last_known_followers = $stats['followers'];
            }

            if ($stats['following'] !== $subscription->last_known_following) {
                $changes[] = "➡️ Following: {$subscription->last_known_following} → {$stats['following']}";
                $subscription->last_known_following = $stats['following'];
            }

            if ($stats['posts'] !== $subscription->last_known_posts) {
                $changes[] = "📝 Posts: {$subscription->last_known_posts} → {$stats['posts']}";
                $subscription->last_known_posts = $stats['posts'];
            }

            if (!empty($changes)) {
                $subscription->save();

                $message = "📈 <b>Profile Update Detected for @{$subscription->profile_username}</b>\n\n" . implode("\n", $changes);
                $this->telegramService->sendMessage([
                    'chat_id' => $subscription->chat_id,
                    'text' => $message,
                    'parse_mode' => 'HTML',
                ]);
            }
        }
    }

    /**
     * Validate Instagram username format.
     *
     * @param string $username
     * @return bool
     */
    protected function validateUsername(string $username): bool
    {
        // Instagram usernames can have letters, numbers, periods, and underscores, 1-30 characters
        return preg_match('/^[A-Za-z0-9._]{1,30}$/', $username) === 1;
    }
}
