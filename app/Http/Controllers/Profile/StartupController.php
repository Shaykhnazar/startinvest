<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\StartupResource;
use App\Models\Startup;

class StartupController extends Controller
{
    public function index()
    {
        $startups = Startup::where('owner_id', auth()->user()->id)->paginate(10);

        return inertia('Profile/Startup/Index',  [
            'startups' => StartupResource::collection($startups),
        ]);
    }

}
