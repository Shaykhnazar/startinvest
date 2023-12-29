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
                Idea::with(['author', 'comments' => function ($query) {
                    $query->paginate(5);
                }, 'votes', 'favorites'])
                    ->withCount(['comments', 'votes', 'favorites'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(10)
            ),
        ]);
    }
}
