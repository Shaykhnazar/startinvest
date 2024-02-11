<?php

namespace App\Http\Controllers;

use App\Http\Resources\IdeaResource;
use App\Models\Idea;
use Illuminate\Database\Eloquent\Builder;

class IdeaController extends Controller
{
    public function index()
    {
        return inertia('Idea/Index', [
            'ideas' => IdeaResource::collection(
                Idea::with([
                    'comments' => function ($query) {
                        $query->latest()->take(10); // Fetch the latest 10 comments
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
