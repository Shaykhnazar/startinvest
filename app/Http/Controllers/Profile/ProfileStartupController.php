<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileStartupRequest;
use App\Http\Resources\StartupResource;
use App\Models\Startup;

class ProfileStartupController extends Controller
{
    public function index()
    {
        $startups = Startup::where('owner_id', auth()->user()->id)->paginate(10);

        return inertia('Profile/Startup/Index',  [
            'startups' => StartupResource::collection($startups),
        ]);
    }

    public function add()
    {
        return inertia('Profile/Startup/Add');
    }

    public function store(ProfileStartupRequest $request)
    {
        // Add the owner_id to the validated data
        $validated['owner_id'] = auth()->user()->id;

        Startup::create($validated);

        return redirect()->route('dashboard.startups')->with('success', 'Startup added successfully!');
    }
}
