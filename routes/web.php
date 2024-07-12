<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\Profile\ProfileIdeaController;
use App\Http\Controllers\Profile\ProfileStartupController;
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
Route::get('/investors', [InvestorController::class, 'index'])->name('investors');
Route::get('/chat', [ChatController::class, 'all'])->middleware(['auth'])->name('chat');
Route::get('/chat/{friend}', [ChatController::class, 'personal'])->middleware(['auth'])->name('chat.cabinet');

// Authenticated and Verified Routes
Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [ProfileController::class, 'dashboard'])->name('index');
    Route::get('/ideas', [ProfileIdeaController::class, 'index'])->name('ideas');
    Route::get('/startups', [ProfileStartupController::class, 'index'])->name('startups');
    Route::get('/startups/add', [ProfileStartupController::class, 'add'])->name('startups.add');
    Route::post('/startups/add', [ProfileStartupController::class, 'store'])->name('startups.store');
    Route::get('/startups/{startup}', [ProfileStartupController::class, 'show'])->name('startups.show')->withTrashed();
    Route::get('/startups/edit/{startup}', [ProfileStartupController::class, 'edit'])->name('startups.edit')->withTrashed();
    Route::put('/startups/edit/{startup}', [ProfileStartupController::class, 'update'])->name('startups.update')->withTrashed();
    Route::delete('/startups/{startup}', [ProfileStartupController::class, 'delete'])->name('startups.delete')->withTrashed();
    Route::put('/startups/set-type/{startup}', [ProfileStartupController::class, 'setType'])->name('startups.setType')->withTrashed();
    Route::delete('/startups/archive/{startup}', [ProfileStartupController::class, 'archive'])->name('startups.archive')->withTrashed();
    Route::put('/startups/restore/{startup}', [ProfileStartupController::class, 'restore'])->name('startups.restore')->withTrashed();
});

// Idea Routes
Route::prefix('ideas')->name('ideas.')->group(function () {
    Route::get('/', [IdeaController::class, 'index'])->name('index');
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');
});

// Startup Routes
Route::prefix('startups')->name('startups.')->group(function () {
    Route::get('/', [StartupController::class, 'index'])->name('index');
});

// Profile Routes requiring Authentication
Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
