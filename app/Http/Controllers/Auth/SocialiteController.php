<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Str;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            // check if already exists
            $user = User::where('email', $socialUser->getEmail())->first();
            $name = $socialUser->getNickname() ?? $socialUser->getName();
            //if it doesn't exist
            if (!$user) {
                // create user
                $user = User::create([
                    'name' => $name,
                    'email' => $socialUser->getEmail(),
                    'password' => Hash::make(Str::random(7)),
                ]);
                // create socials for user
                $user->socials()->create([
                    'provider_id' => $socialUser->getId(),
                    'provider' => $provider,
                    'provider_token' => $socialUser->token,
                    'provider_refresh_token' => $socialUser->refreshToken
                ]);
            }
            // if user does exist
            $socials = Social::where('provider', $provider)
                ->where('user_id', $user->id)->first();
            //check if user doesn't have socials
            if (!$socials) {
                // add socials to user
                $user->socials()->create([
                    'provider_id' => $socialUser->getId(),
                    'provider' => $provider,
                    'provider_token' => $socialUser->token,
                    'provider_refresh_token' => $socialUser->refreshToken
                ]);
            }
        } catch (\Throwable $th) {
            return redirect(route('login'));
        }
        Auth::login($user);
        return redirect()->route('dashboard'); // Redirect to the desired page after authentication
    }
}
