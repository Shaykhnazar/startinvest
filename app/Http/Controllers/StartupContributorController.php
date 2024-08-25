<?php

namespace App\Http\Controllers;

use App\Models\Startup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StartupContributorController extends Controller
{
    public function remove(Request $request, Startup $startup)
    {
        $contributorId = $request->input('contributorId');

        // Ensure the contributor is part of the startup
        $isContributor = DB::table('startup_contributor')
            ->where('startup_id', $startup->id)
            ->where('contributor_id', $contributorId)
            ->exists();

        if (!$isContributor) {
            return response()->json(['error' => 'Contributor does not belong to this startup'], 400);
        }

        // Detach the contributor
        $startup->contributors()->detach($contributorId);

        return response()->json(['message' => 'Contributor removed successfully']);
    }
}
