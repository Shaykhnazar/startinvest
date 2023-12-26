<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteRequest;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        return FavoriteResource::collection(Favorite::all());
    }

    public function store(FavoriteRequest $request)
    {
        return new FavoriteResource(Favorite::create($request->validated()));
    }

    public function update(FavoriteRequest $request, Favorite $favorite)
    {
        $favorite->update($request->validated());

        return new FavoriteResource($favorite);
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return response()->json();
    }
}
