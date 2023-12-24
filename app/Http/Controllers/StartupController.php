<?php

namespace App\Http\Controllers;

use App\Http\Resources\StartupResource;
use App\Models\Comment;
use App\Models\Startup;
use Illuminate\Http\Request;

class StartupController extends Controller
{
    public function index()
    {
        return inertia('Startup/Index', [
            'startups' => StartupResource::collection(Startup::all()),
        ]);
    }

    public function addCommentToStartup(Request $request, Startup $startup)
    {
        $comment = new Comment([
            'body' => $request->input('body'),
        ]);

        $startup->comments()->save($comment);

        return redirect()->back();
    }
}
