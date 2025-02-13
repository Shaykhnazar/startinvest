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
        $this->linkedInAccessToken = config('services.linkedin-openid.access_token');
    }

    /**
     * Publish the startup to LinkedIn.
     */
    public function publish(): void
    {
        try {
            $companyId = config('services.linkedin-openid.company_id');

            $message = "📢 Navbatdagi startup loyiha:\n";
            $message .= "🚀 {$this->startup->title}\n\n";
            $url = route('startups.show', $this->startup->id);

            $response = Http::withToken($this->linkedInAccessToken)
                ->post('https://api.linkedin.com/v2/posts', [
                    'author' => "urn:li:organization:$companyId",
                    'commentary' => $message."🔗 Platformada batafsil tanishish: $url",
                    'visibility' => 'PUBLIC',
                    'distribution' => [
                        'feedDistribution' => 'MAIN_FEED',
                        'targetEntities' => [],
                        'thirdPartyDistributionChannels' => [],
                    ],
                    'lifecycleState' => 'PUBLISHED',
                    'isReshareDisabledByAuthor' => false,
                ]);

            if ($response->successful()) {
                // I want to store link to the published post into the database
                Log::info('Startup successfully published to LinkedIn: ' . $this->startup->title);
            } else {
                Log::error('Failed to publish startup to LinkedIn: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Error in LinkedInPublisher: ' . $e->getMessage());
        }
    }
}
