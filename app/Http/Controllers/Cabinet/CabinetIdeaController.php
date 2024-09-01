<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Resources\IdeaResource;
use App\Models\Idea;

class CabinetIdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::with([
            // TODO: add real-time commenting system
            'comments' => function ($query) {
                $query->limit(10);
            },
            'votes',
            'favorites'
        ])->withCount(['comments', 'votes', 'favorites'])
            ->where('author_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return inertia('Cabinet/Idea/Index',  [
            'ideas' => IdeaResource::collection($ideas),
        ]);

    }
}
