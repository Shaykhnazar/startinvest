<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\Profile\IdeaController as ProfileIdeaController;
use App\Http\Controllers\Profile\StartupController as ProfileStartupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StartupController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/ideas', [ProfileIdeaController::class, 'index'])->name('ideas');
    Route::get('/startups', [ProfileStartupController::class, 'index'])->name('startups');
});



Route::group(['prefix' => 'ideas'], function () {
    Route::get('/', [IdeaController::class, 'index'])->name('ideas');
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
});

Route::get('/startups', [StartupController::class, 'index'])->name('startups');
Route::get('/investors', [InvestorController::class, 'index'])->name('investors');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
