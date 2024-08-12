<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\IdeaResource;
use App\Models\Idea;

class CabinetIdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::where('author_id', auth()->user()->id)->paginate(10);

        return inertia('Cabinet/Idea/Index',  [
            'ideas' => IdeaResource::collection($ideas),
        ]);

    }
}
