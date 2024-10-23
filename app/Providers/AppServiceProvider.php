<?php

namespace App\Providers;

use App\Models\Startup;
use App\Observers\StartupObserver;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\LinkedIn\Provider;
use SocialiteProviders\Manager\SocialiteWasCalled;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
           'idea' => 'App\Models\Idea',
           'startup' => 'App\Models\Startup',
        ]);

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Elektron pochta manzilini tasdiqlang')
                ->line('Elektron pochta manzilingizni tasdiqlash uchun quyidagi tugmani bosing.')
                ->action('Elektron pochta manzilini tasdiqlang', $url);
        });

        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            return (new MailMessage)
                ->subject('Parolni tiklash')
                ->line('Parolni tiklash uchun quyidagi tugmani bosing.')
                ->action('Parolni tiklash', route('password.reset', $token));
        });

        Startup::observe(StartupObserver::class);

        Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('linkedin', Provider::class);
        });
    }
}
