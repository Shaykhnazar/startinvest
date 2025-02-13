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
        if ($provider == 'linkedin-openid') {
            return Socialite::driver($provider)->scopes(['openid', 'profile', 'email', 'w_member_social'])->redirect();
        }

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        // Add debugging to see what we're getting back
        \Log::info('LinkedIn User Data:', [
            'email' => $socialUser->getEmail(),
            'name' => $socialUser->getName(),
            'id' => $socialUser->getId(),
            'token' => $socialUser->token,
        ]);

        $user = $this->findOrCreateUser($socialUser, $provider);

        Auth::login($user);

        return redirect()->route('home');
    }

    private function findOrCreateUser($socialUser, $provider)
    {
        $user = User::where('email', $socialUser->getEmail())->first();

        $name = $socialUser->getNickname() ?? $socialUser->getName();
        $avatar = $user->getAvatar();

        if (!$user) {
            $user = User::create([
                'name' => $name,
                'email' => $socialUser->getEmail(),
                'password' => Hash::make(Str::random(7)),
            ]);

            if ($avatar) {
                $user->details()->create([
                    'avatar' => $avatar
                ]);
            }
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
