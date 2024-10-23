<?php

namespace App\Services\Publisher\Strategies;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class LinkedInPublisher extends BaseSocialMediaPublisher
{
    protected string $linkedInAccessToken;

    public function __construct($startup)
    {
        parent::__construct($startup);
        // Retrieve the access token from your config or database
        $this->linkedInAccessToken = config('services.linkedin.access_token');
    }

    /**
     * Publish the startup to LinkedIn.
     */
    public function publish(): void
    {
        try {
            $response = Http::withToken($this->linkedInAccessToken)
                ->post('https://api.linkedin.com/v2/ugcPosts', [
                    'author' => 'urn:li:member:'.config('services.linkedin.member_id'),
                    'lifecycleState' => 'PUBLISHED',
                    'specificContent' => [
                        'com.linkedin.ugc.ShareContent' => [
                            'shareCommentary' => [
                                'text' => $this->startup->title
                            ],
                            'shareMediaCategory' => 'NONE' // Or you can attach images with MEDIA category
                        ],
                    ],
                    'visibility' => [
                        'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC'
                    ]
                ]);

            if ($response->successful()) {
                Log::info('Startup successfully published to LinkedIn: ' . $this->startup->title);
            } else {
                Log::error('Failed to publish startup to LinkedIn: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Error in LinkedInPublisher: ' . $e->getMessage());
        }
    }
}
