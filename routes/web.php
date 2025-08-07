<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Cabinet\CabinetController;
use App\Http\Controllers\Cabinet\CabinetIdeaController;
use App\Http\Controllers\Cabinet\CabinetStartupController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\InvestmentRoundController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StartupController;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

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

Route::post('language-switch', [LanguageController::class, 'switchLanguage'])->name('language.switch');

Route::group([
    'middleware' => 'locale',
], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
    Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacyPolicy');
    Route::get('/user-agreement', [HomeController::class, 'userAgreement'])->name('userAgreement');
    Route::get('/investors', [InvestorController::class, 'index'])->name('investors');
    Route::get('/chat', [ChatController::class, 'all'])->middleware(['auth'])->name('chat');
    Route::get('/chat/{friend}', [ChatController::class, 'personal'])->middleware(['auth'])->name('chat.cabinet');

    // Search Routes
    Route::prefix('search')->name('search.')->group(function () {
        Route::get('/', [SearchController::class, 'index'])->name('index');
        Route::get('/startups', [SearchController::class, 'startups'])->name('startups');
        Route::get('/investors', [SearchController::class, 'investors'])->name('investors');
        Route::get('/investment-rounds', [SearchController::class, 'investmentRounds'])->name('investment-rounds');
        Route::get('/suggestions', [SearchController::class, 'suggestions'])->name('suggestions');
        Route::get('/advanced', [SearchController::class, 'advanced'])->name('advanced');
        Route::get('/filter-options', [SearchController::class, 'filterOptions'])->name('filter-options');
        
        Route::middleware('auth')->group(function () {
            Route::post('/save', [SearchController::class, 'saveSearch'])->name('save');
            Route::get('/recent', [SearchController::class, 'recentSearches'])->name('recent');
        });
    });

    // Analytics Routes (Admin/Authorized users only)
    Route::middleware(['auth', 'verified'])->prefix('analytics')->name('analytics.')->group(function () {
        Route::get('/', [AnalyticsController::class, 'dashboard'])->name('dashboard');
        Route::get('/investments', [AnalyticsController::class, 'investments'])->name('investments');
        Route::get('/investors', [AnalyticsController::class, 'investors'])->name('investors');
        Route::get('/startups', [AnalyticsController::class, 'startups'])->name('startups');
        Route::get('/custom', [AnalyticsController::class, 'custom'])->name('custom');
        Route::get('/export', [AnalyticsController::class, 'export'])->name('export');
    });

    // Investment Rounds Routes
    Route::prefix('investment-rounds')->name('investment-rounds.')->group(function () {
        Route::get('/', [InvestmentRoundController::class, 'index'])->name('index');
        Route::get('/{investmentRound}', [InvestmentRoundController::class, 'show'])->name('show');
        
        Route::middleware(['auth', 'verified'])->group(function () {
            Route::post('/{investmentRound}/invest', [InvestmentRoundController::class, 'invest'])->name('invest');
        });
    });

    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/category/{category:slug}', [BlogController::class, 'category'])->name('category');
        Route::get('/{post:slug}', [BlogController::class, 'show'])->name('show');
    });

    // Authenticated and Verified Routes
    Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [CabinetController::class, 'dashboard'])->name('index');
        Route::get('/ideas', [CabinetIdeaController::class, 'index'])->name('ideas');
        Route::get('/startups', [CabinetStartupController::class, 'index'])->name('startups');
        Route::get('/startups/add', [CabinetStartupController::class, 'add'])->name('startups.add');
        Route::post('/startups/add', [CabinetStartupController::class, 'store'])->name('startups.store');
        Route::middleware('check.startup.owner')->group(function () {
            Route::get('/startups/{startup}', [CabinetStartupController::class, 'show'])->name('startups.show')->withTrashed();
            Route::get('/startups/edit/{startup}', [CabinetStartupController::class, 'edit'])->name('startups.edit')->withTrashed();
            Route::put('/startups/edit/{startup}', [CabinetStartupController::class, 'update'])->name('startups.update')->withTrashed();
            Route::delete('/startups/{startup}', [CabinetStartupController::class, 'delete'])->name('startups.delete')->withTrashed();
            Route::put('/startups/set-type/{startup}', [CabinetStartupController::class, 'setType'])->name('startups.setType')->withTrashed();
            Route::delete('/startups/archive/{startup}', [CabinetStartupController::class, 'archive'])->name('startups.archive')->withTrashed();
            Route::put('/startups/restore/{startup}', [CabinetStartupController::class, 'restore'])->name('startups.restore')->withTrashed();
        });

        Route::get('/my-profile', [CabinetController::class, 'myProfile'])->name('my-profile');
        Route::get('/startup-teams', [CabinetController::class, 'startupTeams'])->name('startup-teams');

        // Profile sections
        Route::middleware('me.or.role')->prefix('profile')->name('profile.')->group(function () {
            Route::get('/{user?}/edit', [ProfileController::class, 'edit'])->name('edit');
            Route::patch('/{user}', [ProfileController::class, 'update'])->name('update');
            Route::patch('/{user}/details', [ProfileController::class, 'updateDetails'])->name('update-details');
            Route::delete('/{user}', [ProfileController::class, 'destroy'])->name('destroy');
        });
    });

    // Idea Routes
    Route::prefix('ideas')->name('ideas.')->group(function () {
        Route::get('/', [IdeaController::class, 'index'])->name('index');
        Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');
    });

    // Startup Routes
    Route::prefix('startups')->name('startups.')->group(function () {
        Route::get('/', [StartupController::class, 'index'])->name('index');
        Route::get('/{startup}', [StartupController::class, 'show'])->name('show')->middleware('public.startup');
    });

    // Profile Routes requiring Authentication
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/user/{user}', [ProfileController::class, 'publicProfile'])->name('user.profile');
    });

    require __DIR__.'/auth.php';

});


Route::get('setwebhook', function () {
    Telegram::setWebhook(['url' => config('telegram.bots.mybot.webhook_url')]);
    dd('Webhook has been set.');
});

Route::get('setwebhook-insta-track', function () {
    Telegram::bot('instaProfileTrackerBot')->setWebhook(['url' => config('telegram.bots.instaProfileTrackerBot.webhook_url')]);
    dd('Webhook has been set to instaProfileTrackerBot.');
});
