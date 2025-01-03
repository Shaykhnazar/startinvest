<?php

namespace App\Services;

use voku\helper\HtmlDomParser;
use Illuminate\Support\Facades\Log;

class InstagramScraperService
{
    protected $proxy;
    protected $userAgents;

    public function __construct()
    {
        $this->proxy = config('services.instagram_scraper.proxy');
        $this->userAgents = config('services.instagram_scraper.user_agents');
    }

    /**
     * Fetches the current followers, following, and posts count from an Instagram profile.
     *
     * @param string $username Instagram username
     * @return array|null
     */
    public function fetchProfileStats(string $username): ?array
    {
        $profileUrl = "https://www.instagram.com/{$username}/";

        // Initialize cURL
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $profileUrl);
        if ($this->proxy) {
            curl_setopt($ch, CURLOPT_PROXY, $this->proxy);
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP); // Specify HTTP proxy
        }
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2); // Force TLS 1.2
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60); // Increase timeout to 60 seconds
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_VERBOSE, false);

        // Set random user agent
        $randomUserAgent = $this->userAgents[array_rand($this->userAgents)];
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['User-Agent: ' . $randomUserAgent]);

        // Execute the cURL request
        $htmlContent = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            Log::error('cURL Error: ' . curl_error($ch));
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        // Parse the HTML content
        $dom = HtmlDomParser::str_get_html($htmlContent);

//        Log::info($dom);

        if ($dom === false) {
            Log::error("Failed to parse HTML content for URL: $profileUrl");
            return null;
        }

        // Update selectors as Instagram's HTML structure can change
        // These CSS selectors are based on the current structure and may need updates in the future

        // Find all list items that contain the statistics
        $headerElements = $dom->findMulti('main header > section > ul > li');

        Log::error('headerElements', [$headerElements]);

        $stats = [
            'posts' => null,
            'followers' => null,
            'following' => null,
        ];

        foreach ($headerElements as $element) {
            // Attempt to find the count and label within the element
            $countElement = $element->findOne('div > span > span');
            $labelElement = $element->findOne('span');

            if (!$countElement || !$labelElement) {
                continue;
            }

            $label = strtolower(trim($labelElement->plaintext));
            $count = $this->parseCount($countElement->plaintext);

            if (str_contains($label, 'post')) {
                $stats['posts'] = $count;
            } elseif (str_contains($label, 'follower')) {
                $stats['followers'] = $count;
            } elseif (str_contains($label, 'following')) {
                $stats['following'] = $count;
            }
        }

        // Log the extracted stats
        Log::info("Extracted stats for @{$username}: ", $stats);

        // Check if all stats were found
        if ($stats['posts'] === null || $stats['followers'] === null || $stats['following'] === null) {
            Log::error("Failed to extract some stats for URL: $profileUrl");
            return null;
        }

        return $stats;
    }

    /**
     * Parse count strings like "1,850" or "1.8k" to integer.
     *
     * @param string $countString
     * @return int|null
     */
    protected function parseCount(string $countString): ?int
    {
        $countString = trim($countString);
        // Remove commas
        $countString = str_replace(',', '', $countString);

        // Check for 'k' (thousands)
        if (stripos($countString, 'k') !== false) {
            return (int)(floatval($countString) * 1000);
        }

        // Check for 'm' (millions)
        if (stripos($countString, 'm') !== false) {
            return (int)(floatval($countString) * 1000000);
        }

        // Parse as integer
        if (is_numeric($countString)) {
            return (int)$countString;
        }

        return null;
    }
}
