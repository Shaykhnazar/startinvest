<?php

namespace App\Http\Requests;

use App\Enums\StartupTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CabinetStartupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'additional_information' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'has_mvp' => 'required|boolean',
            'status_id' => ['required', 'numeric', 'exists:startup_statuses,id'],
            'type' => ['required', 'string', Rule::enum(StartupTypeEnum::class)],
            'industry_ids' => 'required|array',
            'industry_ids.*' => 'exists:industries,id',
        ];
    }
}
