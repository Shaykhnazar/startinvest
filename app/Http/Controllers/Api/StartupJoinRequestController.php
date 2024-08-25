<?php

namespace App\Http\Controllers\Api;

use App\Enums\JoinRequestStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\JoinRequestStatusRequest;
use App\Models\StartupJoinRequest;
use App\Services\StartupService;
use Illuminate\Http\Request;
use App\Models\Startup;

class StartupJoinRequestController extends Controller
{
    public function sendRequest(Request $request, Startup $startup)
    {
        $joinRequest = StartupJoinRequest::query()->createOrFirst([
            'startup_id' => $startup->id,
            'user_id' => $request->user()->id,
            'status' => JoinRequestStatusEnum::PENDING,
        ]);

        return response()->json(['message' => 'Join request sent successfully', 'data' => $joinRequest], 201);
    }

    public function updateRequest(JoinRequestStatusRequest $request, Startup $startup)
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
        StartupService::handleStatusTransition($validated['fromStatus'], $toStatus, $startup, $joinRequest);

        // If the status changed from PENDING to CANCELED, then delete this request
        if ($validated['fromStatus'] === JoinRequestStatusEnum::PENDING->value && $toStatus === JoinRequestStatusEnum::CANCELED->value) {
            $joinRequest->delete();
            return response()->json(['message' => 'Join request deleted successfully']);
        }

        // Update the join request status and decision time
        $joinRequest->update([
            'status' => $toStatus,
            'decision_at' => now(),
        ]);

        return response()->json(['message' => 'Join request handled successfully', 'data' => $joinRequest]);
    }

    public function listRequests(Startup $startup)
    {
        return response()->json(['data' => $startup->load('joinRequests')]);
    }
}
