<?php

use App\Http\Controllers\Api\IdeaController;
use App\Http\Controllers\Api\StartupContributorController;
use App\Http\Controllers\Api\StartupJoinRequestController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Cabinet\CabinetStartupController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TelegramBotController;
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
    Route::get('ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');

    Route::group(['prefix' => 'ideas', 'as' => 'ideas.', 'middleware' => ['auth', 'web']], function () {
        Route::post('/add', [IdeaController::class, 'store'])->name('add');
        Route::put('/edit/{idea}', [IdeaController::class, 'update'])->name('edit');
        Route::delete('/delete/{idea}', [IdeaController::class, 'destroy'])->name('delete');
        Route::put('/vote/{idea}', [IdeaController::class, 'vote'])->name('vote');
        Route::post('/comment/{idea}', [IdeaController::class, 'comment'])->name('comment');
        Route::put('/favorite/{idea}', [IdeaController::class, 'favorite'])->name('favorite');
    });
    Route::group(['prefix' => 'startups', 'as' => 'startups.', 'middleware' => ['auth', 'web']], function () {
        Route::post('/store', [CabinetStartupController::class, 'store'])->name('store');
        // Manage join requests to startup
        Route::post('/{startup}/send-request', [StartupJoinRequestController::class, 'sendRequest'])->name('send-request');
        Route::patch('{startup}/accept-request', [StartupJoinRequestController::class, 'acceptRequest'])->name('accept-requests');
        Route::get('/{startup}/join-requests', [StartupJoinRequestController::class, 'listRequests'])->name('join-requests');
        // Manage contributors
        Route::patch('{startup}/remove-contributor', [StartupContributorController::class, 'remove'])->name('remove-contributor');
        // Publish to social media
        Route::put('/{startup}/publish-on-media/{platform}', [StartupContributorController::class, 'publishOnMedia'])->name('publish');
    });
    Route::group(['middleware' => ['auth', 'web']], function () {
        // CHAT
        Route::get('/messages/{friend}', [ChatController::class, 'messages'])->name('chat.messages');
        Route::post('/messages/{friend}', [ChatController::class, 'send'])->name('chat.send');

        // NOTIFICATIONS
        Route::post('/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
        Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    });

    Route::post('/telegram/webhook', [TelegramBotController::class, 'handle'])->name('telegram.webhook');
});
