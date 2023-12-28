<?php

use App\Http\Controllers\Api\IdeaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'ideas', 'middleware' => ['auth', 'web']], function () {
        Route::post('/add', [IdeaController::class, 'store'])->name('ideas.add');
        Route::put('/edit/{idea}', [IdeaController::class, 'update'])->name('ideas.edit');
        Route::delete('/delete/{idea}', [IdeaController::class, 'destroy'])->name('ideas.delete');
        Route::put('/vote/{idea}', [IdeaController::class, 'vote'])->name('ideas.vote');
        Route::post('/comment/{idea}', [IdeaController::class, 'comment'])->name('ideas.comment');
        Route::put('/favorite/{idea}', [IdeaController::class, 'favorite'])->name('ideas.favorite');
    });
});
