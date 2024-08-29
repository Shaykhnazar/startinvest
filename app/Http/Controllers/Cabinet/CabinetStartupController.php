<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\StartupStatusEnum;
use App\Enums\StartupTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CabinetStartupRequest;
use App\Http\Requests\ProfileStartupSetTypeRequest;
use App\Http\Resources\IndustryResource;
use App\Http\Resources\StartupResource;
use App\Http\Resources\StartupStatusResource;
use App\Models\Startup;
use App\Services\CacheService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CabinetStartupController extends Controller
{
    public function index()
    {
        $startups = Startup::with('industries')
            ->where('owner_id', auth()->user()->id)
            ->withTrashed()
            ->paginate(10);

        return inertia('Cabinet/Startup/Index', [
            'startups' => StartupResource::collection($startups),
            'industries' => fn () => IndustryResource::collection(CacheService::industryAll()),
            'startupTypes' => fn () => StartupTypeEnum::options(),
            'startupStatuses' => fn () => StartupStatusResource::collection(CacheService::startupStatusAll()),
        ]);
    }

    public function add()
    {
        return inertia('Cabinet/Startup/Add', [
            'industries' => IndustryResource::collection(CacheService::industryAll()),
            'startupTypes' => fn () => StartupTypeEnum::options(),
            'startupStatuses' => fn () => StartupStatusResource::collection(CacheService::startupStatusAll()),
        ]);
    }

    public function store(CabinetStartupRequest $request)
    {
        $data = $request->validated();
        $data['owner_id'] = auth()->user()->id;

        $startup = Startup::create(Arr::except($data, 'industry_ids'));

        if ($request->has('industry_ids')) {
            $startup->industries()->sync($request->input('industry_ids'));
        }

        return redirect()->route('dashboard.startups')->with('success', 'Startup muvaffaqiyatli qo\'shildi!');
    }

    public function show(Startup $startup)
    {
        return inertia('Cabinet/Startup/Show', [
            'startup' => new StartupResource($startup->load('industries', 'joinRequests', 'contributors')),
        ]);
    }

    public function edit(Startup $startup)
    {
        return inertia('Cabinet/Startup/Edit', [
            'startup' => new StartupResource($startup->load('industries')),
            'industries' => fn () => IndustryResource::collection(CacheService::industryAll()),
            'selectedIndustries' => $startup->industries->pluck('id'),
            'startupTypes' => fn () => StartupTypeEnum::options(),
            'startupStatuses' => fn () => StartupStatusResource::collection(CacheService::startupStatusAll()),
        ]);
    }

    public function update(CabinetStartupRequest $request, Startup $startup)
    {
        $data = $request->validated();

        $startup->update(Arr::except($data, 'industry_ids'));

        if ($request->has('industry_ids')) {
            $startup->industries()->sync($request->input('industry_ids'));
        }

        return redirect()->route('dashboard.startups')->with('success', 'Startup muvaffaqiyatli yangilandi!');
    }

    public function delete(Request $request, Startup $startup)
    {
        $startup->forceDelete();

        return redirect()->route('dashboard.startups')->with('success', 'Startup muvaffaqiyatli o\'chirildi!');
    }

    public function setType(ProfileStartupSetTypeRequest $request, Startup $startup)
    {
        $startup->type = $request->validated('type');
        $startup->save();

        return redirect()->route('dashboard.startups')->with('success', 'Startup turi muvaffaqiyatli o\'rnatildi!');
    }

    public function archive(Request $request, Startup $startup)
    {
        $startup->delete();

        return redirect()->route('dashboard.startups')->with('success', 'Startup muvaffaqiyatli arxivlandi!');
    }

    public function restore(Request $request, Startup $startup)
    {
        $startup->restore();

        return redirect()->route('dashboard.startups')->with('success', 'Startup muvaffaqiyatli tiklandi!');
    }
}
