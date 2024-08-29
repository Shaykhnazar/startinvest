<?php

namespace App\Http\Requests;

use App\Enums\StartupStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StartupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => 'nullable|string|max:255',
            'industry_id' => 'nullable|exists:industries,id',
            'status' => ['nullable','string', Rule::in(StartupStatusEnum::values())],
            'sort' => 'nullable|string|in:created_at-asc,title-asc,title-desc,created_at-desc',
        ];
    }
}
