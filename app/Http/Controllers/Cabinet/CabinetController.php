<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
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

        // Get contributed startups
        $contributedStartups = $request->user()->load('contributedStartups')->contributedStartups;

        // Merge both collections
        $mergedStartups = $startupTeams->merge($contributedStartups);

        return Inertia::render('Cabinet/StartupTeams', [
            'startups' => StartupResource::collection($mergedStartups),
            'contributedStartups' => StartupResource::collection($contributedStartups),
        ]);
    }
}
