<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateDetailsRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        $user = $request->user();

        // Load user details and social profiles
        $userDetail = $user->details;
        $socialProfiles = $user->socialProfiles;

        return Inertia::render('Cabinet/ProfileEdit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'userDetail' => $userDetail,
            'socialProfiles' => $socialProfiles,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update user basic information
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('dashboard.profile.edit', $user->id);
    }

    /**
     * Update the user's profile information.
     */
    public function updateDetails(ProfileUpdateDetailsRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update user detail
        $userDetail = $user->details ?? new UserDetail(['user_id' => $user->id]);
        $userDetail->fill($request->only([
            'avatar', 'cover_photo', 'resume', 'bio', 'skills',
            'experience', 'education', 'organization'
        ]));
        $userDetail->save();

        // Update or create social profiles
        $socialProfilesData = $request->input('social_profiles', []);
        foreach ($socialProfilesData as $profileData) {
            $socialProfile = $user->socialProfiles()->updateOrCreate(
                ['social_profile_type' => $profileData['social_profile_type']],
                ['url' => $profileData['url']]
            );
        }
        $user->save();

        return Redirect::route('dashboard.profile.edit', $user->id);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function publicProfile(Request $request, User $user): Response
    {
        return Inertia::render('UserPublicProfile', [
            'user' => new UserResource($user)
        ]);
    }
}
