<?php

namespace App\Http\Controllers;

use App\Http\Resources\IdeaResource;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function index()
    {
        return inertia('Idea/Index', [
            'ideas' => IdeaResource::collection(Idea::with('author')->get()),
        ]);
    }

    public function show(Idea $idea)
    {
        return inertia('Idea/Show', [
            'idea' => new IdeaResource($idea),
        ]);
    }
}
