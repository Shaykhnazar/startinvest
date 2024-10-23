<?php

namespace App\Services\Publisher\Strategies;

use App\Models\Startup;

abstract class BaseSocialMediaPublisher
{
    protected Startup $startup;

    public function __construct($startup)
    {
        $this->startup = $startup;
    }

    /**
     * Method to publish the startup to a social media platform
     */
    abstract public function publish(): void;
}
