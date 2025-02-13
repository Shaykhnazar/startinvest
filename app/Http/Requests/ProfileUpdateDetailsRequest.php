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
            'avatar' => ['nullable', 'image', 'max:2048'],
            'cover_photo' => ['nullable', 'image', 'max:2048'],
            'resume' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['string', 'max:50'],
            'experience' => ['nullable', 'array'],
            'experience.*.company' => ['required', 'string'],
            'experience.*.position' => ['required', 'string'],
            'experience.*.period' => ['required', 'array'],
            'education' => ['nullable', 'array'],
            'education.*.institution' => ['required', 'string'],
            'education.*.degree' => ['required', 'string'],
            'education.*.period' => ['required', 'array'],
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
