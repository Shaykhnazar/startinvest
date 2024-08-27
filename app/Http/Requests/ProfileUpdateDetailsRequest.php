<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateDetailsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            // Additional fields for user details
            'avatar' => ['nullable', 'string'], // Assuming a URL or a file path
            'cover_photo' => ['nullable', 'string'], // Assuming a URL or a file path
            'resume' => ['nullable', 'string'], // Assuming a URL or a file path
            'bio' => ['nullable', 'string', 'max:1000'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['string', 'max:255'], // Validation for each skill if it's an array of strings
            'experience' => ['nullable', 'string', 'max:1000'],
            'education' => ['nullable', 'string', 'max:1000'],
            'organization' => ['nullable', 'string', 'max:255'],

            // Validation for social profiles if they are part of the request
            'social_profiles' => ['nullable', 'array'],
            'social_profiles.*.social_profile_type' => ['required_with:social_profiles.*.url', 'string', 'max:255'],
            'social_profiles.*.url' => ['required_with:social_profiles.*.social_profile_type', 'string', 'url', 'max:255'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

}
