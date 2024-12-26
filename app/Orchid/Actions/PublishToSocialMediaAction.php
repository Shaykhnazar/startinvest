<?php

namespace App\Orchid\Actions;

use App\Jobs\PublishStartupToSocialMediaJob;
use App\Models\Startup;
use Illuminate\Support\Collection;
use Orchid\Crud\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;

class PublishToSocialMediaAction extends Action
{
    /**
     * The button of the action.
     *
     * @return Button
     */
    public function button(): Button
    {
        return Button::make('Publish to Social Media')
            ->method('handle')
            ->confirm('Are you sure you want to publish this startup to social media?')
            ->icon('share');

    }

    /**
     * Perform the action on the given models.
     *
     * @param \Illuminate\Support\Collection $models
     */
    public function handle(Collection $models): void
    {
        $models->each(function (Startup $model) {
            if (!$model->verified && $model->public()) {
                // Dispatch a job to publish to social media
                PublishStartupToSocialMediaJob::dispatch($model);
            }
        });

        // Provide user feedback
        Toast::info('The startup has been published to social media successfully.');
    }
}
