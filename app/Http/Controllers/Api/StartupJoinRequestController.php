<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StartupAcceptRequest;
use App\Http\Requests\StartupSendJoinRequest;
use App\Models\StartupJoinRequest;
use App\Services\StartupService;
use App\Models\Startup;
use Illuminate\Http\JsonResponse;

class StartupJoinRequestController extends Controller
{
    /**
     * User sends join or leave request to this method, and we create it to show to the owner of startup.
     *
     * @param StartupSendJoinRequest $request
     * @param Startup $startup
     * @return JsonResponse
     */
    public function sendRequest(StartupSendJoinRequest $request, Startup $startup): JsonResponse
    {
        $joinRequest = StartupJoinRequest::query()->createOrFirst([
            'startup_id' => $startup->id,
            'user_id' => $request->user()->id,
            'status' => $request->validated()['status'],
        ]);

        return response()->json(['message' => 'Request sent successfully', 'data' => $joinRequest], 201);
    }

    /**
     * The owner of the startup sends a request to accept or decline the request of user who wants to contribute.
     *
     * @param StartupAcceptRequest $request
     * @param Startup $startup
     * @return JsonResponse
     */
    public function acceptRequest(StartupAcceptRequest $request, Startup $startup): JsonResponse
    {
        $validated = $request->validated();
        $toStatus = $validated['toStatus'];

        // Retrieve the join request
        $joinRequest = StartupJoinRequest::findOrFail($validated['requestId']);

        // Ensure the join request belongs to the startup
        if ($joinRequest->startup_id !== $startup->id) {
            return response()->json(['error' => 'Join request does not belong to this startup'], 400);
        }

        // Handle status transition logic
        $wasDeleted = StartupService::handleStatusTransition($validated['fromStatus'], $toStatus, $startup, $joinRequest);

        // If the request was deleted, return immediately
        if ($wasDeleted) {
            return response()->json(['message' => 'Join request deleted successfully']);
        }

        // Update the join request status and decision time
//        $joinRequest->update([
//            'status' => $toStatus,
//            'decision_at' => now(),
//        ]);

        return response()->json(['message' => 'Join request handled successfully', 'data' => $joinRequest]);
    }

    /**
     * @param Startup $startup
     * @return JsonResponse
     */
    public function listRequests(Startup $startup): JsonResponse
    {
        return response()->json(['data' => $startup->load('joinRequests')]);
    }
}
