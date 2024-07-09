<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileStartupRequest;
use App\Http\Requests\ProfileStartupSetTypeRequest;
use App\Http\Resources\StartupResource;
use App\Models\Startup;
use Illuminate\Http\Request;

class ProfileStartupController extends Controller
{
    public function index()
    {
        $startups = Startup::query()->where('owner_id', auth()->user()->id)->withTrashed()->paginate(10);

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
        $data = $request->validated();
        // Add the owner_id to the validated data
        $data['owner_id'] = auth()->user()->id;

        Startup::create($data);

        return redirect()->route('dashboard.startups')->with('success', 'Startup added successfully!');
    }

    public function show(Startup $startup)
    {
        return inertia('Profile/Startup/Show', [
            'startup' => new StartupResource($startup),
        ]);
    }

    public function edit(Startup $startup)
    {
        return inertia('Profile/Startup/Edit', [
            'startup' => new StartupResource($startup),
        ]);
    }

    public function update(ProfileStartupRequest $request, Startup $startup)
    {
        $data = $request->validated();

        // Update the startup attributes
        $startup->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'additional_information' => $data['additional_information'],
            'start_date' => $data['start_date'],
            'type' => $data['type'],
            'status' => $data['status'],
            'has_mvp' => $data['has_mvp'],
        ]);

        return redirect()->route('dashboard.startups')->with('success', 'Startup updated successfully!');
    }

    public function delete(Request $request, Startup $startup)
    {
        $startup->forceDelete();

        return redirect()->route('dashboard.startups')->with('success', 'Startup deleted successfully!');
    }

    public function setType(ProfileStartupSetTypeRequest $request, Startup $startup)
    {
        $startup->type = $request->validated('type');
        $startup->save();

        return redirect()->route('dashboard.startups')->with('success', 'Startup type set successfully!');
    }

    public function archive(Request $request, Startup $startup)
    {
        $startup->delete();

        return redirect()->route('dashboard.startups')->with('success', 'Startup archived successfully!');
    }

    public function restore(Request $request, Startup $startup)
    {
        $startup->restore();

        return redirect()->route('dashboard.startups')->with('success', 'Startup restored successfully!');
    }

}
