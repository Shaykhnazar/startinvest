<?php

namespace App\Http\Controllers;

use App\Http\Resources\StartupResource;
use App\Models\Startup;

class StartupController extends Controller
{
    public function index()
    {
        return inertia('Startup/Index', [
            'startups' => StartupResource::collection(Startup::all()),
        ]);
    }
}
