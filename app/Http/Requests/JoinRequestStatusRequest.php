<?php

namespace App\Http\Requests;

use App\Enums\JoinRequestStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JoinRequestStatusRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fromStatus' => ['required', Rule::in(JoinRequestStatusEnum::values())],
            'toStatus' => ['required', Rule::in(JoinRequestStatusEnum::values())],
            'requestId' => ['required', 'exists:startup_join_requests,id'],
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
