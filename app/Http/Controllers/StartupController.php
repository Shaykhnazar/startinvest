<?php

namespace App\Http\Controllers;

use App\Enums\StartupStatusEnum;
use App\Http\Resources\IndustryResource;
use App\Http\Resources\StartupResource;
use App\Models\Startup;
use App\Services\CacheService;
use Illuminate\Http\Request;

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
            'industries' => IndustryResource::collection(CacheService::industryAll()),
            'startupStatuses' => StartupStatusEnum::options(),
        ]);
    }

    public function show(Request $request, Startup $startup)
    {
        return inertia('Startup/Show', [
            'startup' => StartupResource::make($startup->load('industries', 'contributors', 'comments', 'owner')),
        ]);
    }
}
