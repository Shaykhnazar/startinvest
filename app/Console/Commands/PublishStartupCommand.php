<?php
namespace App\Console\Commands;

use App\Services\Publisher\SocialMediaPublisherFactory;
use App\Models\Startup;
use Illuminate\Console\Command;

class PublishStartupCommand extends Command
{
    protected $signature = 'startup:publish {startupId} {platform}';
    protected $description = 'Publish a startup to a specified social media platform';

    public function handle()
    {
        $startup = Startup::findOrFail($this->argument('startupId'));
        $platform = $this->argument('platform');

        try {
            $publisher = SocialMediaPublisherFactory::create($platform, $startup);
            $publisher->publish();
            $this->info("Startup published to {$platform}");
        } catch (\Exception $e) {
            $this->error('Failed to publish: ' . $e->getMessage());
        }
    }
}
