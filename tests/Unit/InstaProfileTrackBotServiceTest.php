<?php

namespace Tests\Unit;

use App\Models\Subscription;
use App\Services\InstaProfileTrackBotService;
use App\Services\InstagramScraperService;
use App\Services\TelegramServiceInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;
use Telegram\Bot\Laravel\Facades\Telegram;

class InstaProfileTrackBotServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $instagramScraperServiceMock;
    protected $telegramServiceMock;
    protected $instaProfileTrackBotService;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock the InstagramScraperService
        $this->instagramScraperServiceMock = Mockery::mock(InstagramScraperService::class);
        $this->app->instance(InstagramScraperService::class, $this->instagramScraperServiceMock);

        // Mock the TelegramServiceInterface
        $this->telegramServiceMock = Mockery::mock(TelegramServiceInterface::class);
        $this->app->instance(TelegramServiceInterface::class, $this->telegramServiceMock);

        // Instantiate the service with the mocked InstagramScraperService
        $this->instaProfileTrackBotService = $this->app->make(InstaProfileTrackBotService::class);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testSubscribeSuccess()
    {
        $chatId = env('EXAMPLE_CHAT_ID');
        $username = env('EXAMPLE_INSTAGRAM_USERNAME');

        // Mock InstagramScraperService response
        $this->instagramScraperServiceMock
            ->shouldReceive('fetchProfileStats')
            ->with($username)
            ->once()
            ->andReturn([
                'followers' => 1500,
                'following' => 300,
                'posts' => 75,
            ]);

        $response = $this->instaProfileTrackBotService->subscribe($chatId, $username);

        $this->assertEquals("✅ Successfully subscribed to @{$username}. You will be notified of any changes.", $response);
        $this->assertDatabaseHas('subscriptions', [
            'chat_id' => $chatId,
            'profile_username' => $username,
            'status' => 'active',
            'last_known_followers' => 1500,
            'last_known_following' => 300,
            'last_known_posts' => 75,
        ]);
    }

    public function testSubscribeAlreadySubscribed()
    {
        $chatId = env('EXAMPLE_CHAT_ID');
        $username = env('EXAMPLE_INSTAGRAM_USERNAME');

        // Create an existing subscription
        Subscription::create([
            'chat_id' => $chatId,
            'profile_username' => $username,
            'status' => 'active',
            'last_known_followers' => 1500,
            'last_known_following' => 300,
            'last_known_posts' => 75,
        ]);

        $response = $this->instaProfileTrackBotService->subscribe($chatId, $username);

        $this->assertEquals("⚠️ You are already subscribed to @{$username}.", $response);
    }

    public function testSubscribeInvalidUsername()
    {
        $chatId = env('EXAMPLE_CHAT_ID');
        $username = 'invalid username!';

        $response = $this->instaProfileTrackBotService->subscribe($chatId, $username);

        $this->assertEquals("❌ Invalid Instagram username. Please provide a valid username.", $response);
        $this->assertDatabaseMissing('subscriptions', [
            'chat_id' => $chatId,
            'profile_username' => $username,
        ]);
    }

    public function testSubscribeProfileNotFound()
    {
        $chatId = env('EXAMPLE_CHAT_ID');
        $username = 'nonexistentuser';

        // Mock InstagramScraperService response as null
        $this->instagramScraperServiceMock
            ->shouldReceive('fetchProfileStats')
            ->with($username)
            ->once()
            ->andReturn(null);

        $response = $this->instaProfileTrackBotService->subscribe($chatId, $username);

        $this->assertEquals("❌ Unable to fetch data for @{$username}. Please ensure the username is correct and accessible.", $response);
        $this->assertDatabaseMissing('subscriptions', [
            'chat_id' => $chatId,
            'profile_username' => $username,
        ]);
    }

    public function testUnsubscribeSuccess()
    {
        $chatId = env('EXAMPLE_CHAT_ID');
        $username = env('EXAMPLE_INSTAGRAM_USERNAME');

        // Create an existing subscription
        Subscription::create([
            'chat_id' => $chatId,
            'profile_username' => $username,
            'status' => 'active',
            'last_known_followers' => 1500,
            'last_known_following' => 300,
            'last_known_posts' => 75,
        ]);

        $response = $this->instaProfileTrackBotService->unsubscribe($chatId, $username);

        $this->assertEquals("✅ Successfully unsubscribed from @{$username}.", $response);
        $this->assertDatabaseMissing('subscriptions', [
            'chat_id' => $chatId,
            'profile_username' => $username,
        ]);
    }

    public function testUnsubscribeNotSubscribed()
    {
        $chatId = env('EXAMPLE_CHAT_ID');
        $username = 'nonexistentuser';

        $response = $this->instaProfileTrackBotService->unsubscribe($chatId, $username);

        $this->assertEquals("⚠️ You are not subscribed to @{$username}.", $response);
    }

    public function testCheckAllSubscriptionsWithChanges()
    {
        $chatId = env('EXAMPLE_CHAT_ID');
        $username = env('EXAMPLE_INSTAGRAM_USERNAME');

        // Create an existing subscription
        Subscription::create([
            'chat_id' => $chatId,
            'profile_username' => $username,
            'status' => 'active',
            'last_known_followers' => 1500,
            'last_known_following' => 300,
            'last_known_posts' => 75,
        ]);

        // Mock InstagramScraperService response with updated data
        $this->instagramScraperServiceMock
            ->shouldReceive('fetchProfileStats')
            ->with($username)
            ->once()
            ->andReturn([
                'followers' => 1550, // Changed
                'following' => 300,  // No change
                'posts' => 80,       // Changed
            ]);

        // Mock Telegram sendMessage
        Telegram::shouldReceive('bot')
            ->with('instaProfileTrackerBot')
            ->andReturnSelf();

        Telegram::shouldReceive('sendMessage')
            ->withArgs(function ($args) use ($chatId, $username) {
                return $args['chat_id'] === $chatId &&
                    str_contains($args['text'], "Profile Update Detected for @{$username}");
            })
            ->once();

        $this->instaProfileTrackBotService->checkAllSubscriptions();

        // Assert that the subscription is updated
        $this->assertDatabaseHas('subscriptions', [
            'chat_id' => $chatId,
            'profile_username' => $username,
            'last_known_followers' => 1550,
            'last_known_following' => 300,
            'last_known_posts' => 80,
        ]);
    }
}
