<?php

namespace App\Http\Controllers;

use App\Http\Resources\StartupResource;
use App\Models\Startup;

class StartupController extends Controller
{
    public function index()
    {
        $startups = Startup::query()
            ->latest()
            ->public()
            ->paginate(10);

        return inertia('Startup/Index', [
            'startups' => StartupResource::collection($startups),
        ]);
    }
}
