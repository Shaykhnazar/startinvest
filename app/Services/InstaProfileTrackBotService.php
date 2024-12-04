<?php

namespace App\Services;

use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\Laravel\Facades\Telegram;

class InstaProfileTrackBotService
{
    public function __construct(protected InstagramScraperService $instagramScraperService) {}

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
            $username = $subscription->profile_username;
            $chatId = $subscription->chat_id;

            // Fetch current profile data
            $currentData = $this->instagramScraperService->fetchProfileStats($username);

            if (!$currentData) {
                Log::error("Failed to fetch data for @{$username}");
                continue;
            }

            $changes = [];

            // Detect changes in followers
            if ($subscription->last_known_followers !== null && $subscription->last_known_followers != $currentData['followers']) {
                $changes['followers'] = [
                    'old' => $subscription->last_known_followers,
                    'new' => $currentData['followers'],
                ];
            }

            // Detect changes in following
            if ($subscription->last_known_following !== null && $subscription->last_known_following != $currentData['following']) {
                $changes['following'] = [
                    'old' => $subscription->last_known_following,
                    'new' => $currentData['following'],
                ];
            }

            // Detect changes in posts
            if ($subscription->last_known_posts !== null && $subscription->last_known_posts != $currentData['posts']) {
                $changes['posts'] = [
                    'old' => $subscription->last_known_posts,
                    'new' => $currentData['posts'],
                ];
            }

            if (!empty($changes)) {
                // Update the subscription with new data
                $subscription->update([
                    'last_known_followers' => $currentData['followers'],
                    'last_known_following' => $currentData['following'],
                    'last_known_posts' => $currentData['posts'],
                ]);

                // Send notification to the user
                $this->sendNotification($chatId, $username, $changes);
            }
        }
    }

    /**
     * Send a notification message to the user via Telegram.
     *
     * @param int $chatId Telegram chat ID
     * @param string $username Instagram username
     * @param array $changes Detected changes
     * @return void
     * @throws TelegramSDKException
     */
    protected function sendNotification(int $chatId, string $username, array $changes): void
    {
        $text = "📢 <b>Profile Update Detected for @{$username}</b>\n\n";

        foreach ($changes as $key => $change) {
            $emoji = '';
            switch ($key) {
                case 'followers':
                    $emoji = '👥';
                    break;
                case 'following':
                    $emoji = '➡️';
                    break;
                case 'posts':
                    $emoji = '📝';
                    break;
            }
            $text .= "{$emoji} <b>" . ucfirst($key) . ":</b> {$change['old']} ➔ {$change['new']}\n";
        }

        Telegram::bot('instaProfileTrackerBot')->sendMessage([
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML',
        ]);
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
