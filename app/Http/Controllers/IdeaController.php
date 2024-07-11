<?php

namespace App\Http\Controllers;

use App\Http\Resources\IdeaResource;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function index()
    {
        return inertia('Idea/Index', [
            'ideas' => IdeaResource::collection(
                Idea::with([
                    // TODO: add real-time commenting system
                    'comments' => function ($query) {
                        $query->limit(10);
                    },
                    'votes',
                    'favorites'
                ])->withCount(['comments', 'votes', 'favorites'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(10)
            ),
        ]);
    }
}
