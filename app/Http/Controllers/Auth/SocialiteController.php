<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Str;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $user = $this->findOrCreateUser($socialUser, $provider);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    private function findOrCreateUser($socialUser, $provider)
    {
        $user = User::where('email', $socialUser->getEmail())->first();

        $name = $socialUser->getNickname() ?? $socialUser->getName();

        if (!$user) {
            $user = User::create([
                'name' => $name,
                'email' => $socialUser->getEmail(),
                'password' => Hash::make(Str::random(7)),
            ]);
        }

        $this->attachSocialsToUser($user, $socialUser, $provider);

        return $user;
    }

    private function attachSocialsToUser($user, $socialUser, $provider)
    {
        $socials = Social::where('provider', $provider)
            ->where('user_id', $user->id)
            ->first();

        if (!$socials) {
            $user->socials()->create([
                'provider_id' => $socialUser->getId(),
                'provider' => $provider,
                'provider_token' => $socialUser->token,
                'provider_refresh_token' => $socialUser->refreshToken,
            ]);
        }
    }
}
