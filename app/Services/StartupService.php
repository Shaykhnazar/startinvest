<?php

namespace App\Services;

use App\Console\Commands\PublishStartupCommand;
use App\Enums\JoinRequestStatusEnum;
use App\Models\Startup;
use App\Models\StartupJoinRequest;
use App\Notifications\AcceptRequestNotification;
use App\Services\Translation\TranslationServiceFactory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class StartupService
{

    /**
     * Handle the logic for accepting a join request.
     *
     * @param Startup $startup
     * @param StartupJoinRequest $joinRequest
     * @return void
     */
    public static function attachToContributors(Startup $startup, StartupJoinRequest $joinRequest): void
    {
        // Attach the user as a contributor if not already attached
        if (!$startup->contributors()->where('contributor_id', $joinRequest->user_id)->exists()) {
            $startup->contributors()->attach($joinRequest->user_id);
        }
    }

    /**
     * Handle the logic for rejecting a join request.
     *
     * @param Startup $startup
     * @param StartupJoinRequest $joinRequest
     * @return void
     */
    public static function detachFromContributors(Startup $startup, StartupJoinRequest $joinRequest): void
    {
        // Detach the user from the startup if they are currently attached
        if ($startup->contributors()->where('contributor_id', $joinRequest->user_id)->exists()) {
            $startup->contributors()->detach($joinRequest->user_id);
        }
    }

    /**
     * Handle status transition logic
     *
     * @param string $fromStatus
     * @param string $toStatus
     * @param Startup $startup
     * @param StartupJoinRequest $joinRequest
     * @return bool
     */
    public static function handleStatusTransition(string $fromStatus, string $toStatus, Startup $startup, StartupJoinRequest &$joinRequest): bool
    {
        $joinRequestIsDeleted = false;
        // Define the actions based on status transitions
        $actions = [
            JoinRequestStatusEnum::PENDING->value => [
                JoinRequestStatusEnum::CANCELED->value => ['deleteRequest'], // used when user canceled their own join request
                JoinRequestStatusEnum::REJECTED->value => ['deleteRequest'],
                JoinRequestStatusEnum::ACCEPTED->value => ['attach', 'deleteRequest'],
            ],
            JoinRequestStatusEnum::LEAVED->value => [
                JoinRequestStatusEnum::ACCEPTED->value => ['detach', 'deleteRequest'],
                JoinRequestStatusEnum::REJECTED->value => ['deleteRequest'],
            ],
        ];

        // Check if the transition is valid
        if (isset($actions[$fromStatus][$toStatus])) {
            $actionsToPerform = $actions[$fromStatus][$toStatus];

            // Perform the actions based on the transition
            foreach ($actionsToPerform as $action) {
                if ($action === 'attach') {
                    self::attachToContributors($startup, $joinRequest);
                } elseif ($action === 'detach') {
                    self::detachFromContributors($startup, $joinRequest);
                } elseif ($action === 'deleteRequest') {
                    $joinRequest->delete();
                    $joinRequestIsDeleted = true; // Return true if the join request was deleted
                }
            }

            // Additional logic for REJECTED and ACCEPTED if necessary
            if ($toStatus === JoinRequestStatusEnum::REJECTED->value || $toStatus === JoinRequestStatusEnum::ACCEPTED->value) {
                $message = $toStatus === JoinRequestStatusEnum::REJECTED->value ? 'Jamoaga qo\'shilish so\'rovingizni rad qildi!' : 'Jamoaga qo\'shilish so\'rovingizni qabul qildi!';
                // Notify the user
                $joinRequest->user->notify(new AcceptRequestNotification($joinRequest, $toStatus, $message));
            }
        }

        return $joinRequestIsDeleted; // Return false if no special action like deletion was performed
    }

    /**
     * Helper function to run the publish command for a specific platform.
     *
     * @param Startup $startup
     * @param string $platform
     */
    public static function publishOnMedia(Startup $startup, string $platform): void
    {
        // Use Artisan command to publish the startup to the specified platform
        try {
            Artisan::call(PublishStartupCommand::class, [
                'startupId' => $startup->id,
                'platform' => $platform
            ]);

            Log::info("Published startup {$startup->title} to {$platform}");
        } catch (\Exception $e) {
            Log::error("Failed to publish startup to {$platform}: " . $e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public function getTranslations(array $data): array
    {
        $translationService = TranslationServiceFactory::create();

        // Translate fields to desired languages
        $translations = [];
        foreach (['en' => 'en', 'ru' => 'ru', 'uz_Latn' => 'uz'] as $storeAs => $locale) {
            $translations['title'][$storeAs] = $translationService->translate($data['title'], $locale);

            if (!empty($data['description'])) {
                $translations['description'][$storeAs] = $translationService->translate($data['description'], $locale);
            }

            if (!empty($data['additional_information'])) {
                $translations['additional_information'][$storeAs] = $translationService->translate($data['additional_information'], $locale);
            }
        }
        return $translations;
    }
}
