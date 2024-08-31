<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Resources\StartupJoinRequestResource;
use App\Http\Resources\StartupResource;
use App\Models\Startup;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CabinetController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Cabinet/Dashboard');
    }

    public function myProfile()
    {
        return Inertia::render('Cabinet/MyProfile');
    }

    public function startupTeams(Request $request)
    {
        // Get startup teams where the user has join requests
        $startupTeams = Startup::query()->whereHas('joinRequests', function ($query) use ($request) {
            $query->where('user_id', $request->user()->id);
        })->get();

        $request->user()->load('contributedStartups', 'joinRequests');
        // Get contributed startups
        $contributedStartups = $request->user()->contributedStartups;
        // Get join requests
        $joinRequests = $request->user()->joinRequests;

        return Inertia::render('Cabinet/StartupTeams', [
            'startups' => StartupResource::collection($startupTeams),
            'contributedStartups' => StartupResource::collection($contributedStartups),
            'joinRequests' => StartupJoinRequestResource::collection($joinRequests),
        ]);
    }
}
