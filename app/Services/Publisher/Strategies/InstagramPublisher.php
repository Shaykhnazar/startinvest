<?php

namespace App\Services\Publisher\Strategies;

use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Support\Facades\Log;

class InstagramPublisher extends BaseSocialMediaPublisher
{
    protected Facebook $facebook;

    /**
     * @throws FacebookSDKException
     */
    public function __construct($startup)
    {
        parent::__construct($startup);
        $this->facebook = new Facebook([
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'default_graph_version' => 'v13.0',
            'default_access_token' => env('INSTAGRAM_ACCESS_TOKEN'),
        ]);
    }

    public function publish(): void
    {
        try {
            $message = $this->generateMessage();

            // Get Instagram Business Account ID
            $response = $this->facebook->get('/me/accounts');
            $pages = $response->getDecodedBody()['data'];
            $pageId = $pages[0]['id'];

            // Get Instagram account linked to the page
            $instagramResponse = $this->facebook->get("/{$pageId}?fields=instagram_business_account");
            $instagramBusinessAccountId = $instagramResponse->getDecodedBody()['instagram_business_account']['id'];

            // Publish the post to Instagram
            $postResponse = $this->facebook->post(
                "/{$instagramBusinessAccountId}/media",
                [
                    'caption' => $message,
                    'image_url' => $this->startup->image_url, // Ensure image URL is available
                ]
            );

            $creationId = $postResponse->getDecodedBody()['id'];

            // Finalize the media container to create the post
            $this->facebook->post("/{$instagramBusinessAccountId}/media_publish", [
                'creation_id' => $creationId,
            ]);

            Log::info('Successfully published startup to Instagram: ' . $this->startup->title);
        } catch (\Exception $e) {
            Log::error('Error in InstagramPublisher: ' . $e->getMessage());
        }
    }

    /**
     * Generate the message to be published on Instagram.
     *
     * @return string
     */
    private function generateMessage(): string
    {
        $message = "🚀 Check out our new startup: {$this->startup->title}!\n";
        $message .= $this->startup->description ? "📄 Description: {$this->startup->description}\n" : '';
        $message .= "🔗 Learn more: " . route('startups.show', $this->startup->id);

        return $message;
    }
}
