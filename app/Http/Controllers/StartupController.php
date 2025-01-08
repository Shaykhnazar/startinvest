<?php

namespace App\Http\Controllers;

use App\Http\Resources\IndustryResource;
use App\Http\Resources\StartupResource;
use App\Http\Resources\StartupStatusResource;
use App\Models\Startup;
use App\Services\CacheService;
use Illuminate\Http\Request;

class StartupController extends Controller
{
    public function index(Request $request)
    {
        $startups = Startup::query()
            ->public()
            ->applySearch($request->input('search'))
            ->filterByIndustry($request->input('industry_id'))
            ->filterByStatus($request->input('status_id'))
            ->sortBy($request->input('sort', 'created_at-desc'))
            ->paginate(10);

        return inertia('Startup/Index', [
            'startups' => StartupResource::collection($startups),
            'industries' => fn () => IndustryResource::collection(CacheService::industryAll()),
            'startupStatuses' => fn () => StartupStatusResource::collection(CacheService::startupStatusAll()),
            'filters' => $request->only(['search', 'industry_id', 'status_id', 'sort']),
        ]);
    }

    public function show(Request $request, Startup $startup)
    {
        // Add view
        $startup->addView();

        return inertia('Startup/Show', [
            'startup' => StartupResource::make($startup->load('industries', 'contributors', 'comments', 'owner', 'status')),
        ]);
    }
}
