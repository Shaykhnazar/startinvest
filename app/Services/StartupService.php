<?php

namespace App\Services;

use App\Enums\JoinRequestStatusEnum;
use App\Models\Startup;
use App\Models\StartupJoinRequest;

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
     * @return void
     */
    public static function handleStatusTransition(string $fromStatus, string $toStatus, Startup $startup, StartupJoinRequest $joinRequest): void
    {
        // Define the actions based on status transitions
        $actions = [
            JoinRequestStatusEnum::PENDING->value => [
                JoinRequestStatusEnum::ACCEPTED->value => 'attach',
            ],
            JoinRequestStatusEnum::ACCEPTED->value => [
                JoinRequestStatusEnum::REJECTED->value => 'detach',
            ],
            JoinRequestStatusEnum::REJECTED->value => [
                JoinRequestStatusEnum::ACCEPTED->value => 'attach',
            ],
            JoinRequestStatusEnum::CANCELED->value => [
                JoinRequestStatusEnum::ACCEPTED->value => 'detach',
            ],
            JoinRequestStatusEnum::LEAVED->value => [
                JoinRequestStatusEnum::ACCEPTED->value => 'detach',
            ],
        ];

        // Check if the transition is valid
        if (isset($actions[$fromStatus][$toStatus])) {
            $action = $actions[$fromStatus][$toStatus];

            // Perform the action based on the transition
            if ($action === 'attach') {
                self::attachToContributors($startup, $joinRequest);
            } elseif ($action === 'detach') {
                self::detachFromContributors($startup, $joinRequest);
            }

            // Additional logic for CANCELED and LEAVED if necessary
            if ($toStatus === JoinRequestStatusEnum::CANCELED || $toStatus === JoinRequestStatusEnum::LEAVED) {
                // Implement any additional logic for CANCELED or LEAVED status
                // e.g., log actions, notify users, etc.
            }
        }
    }

}
