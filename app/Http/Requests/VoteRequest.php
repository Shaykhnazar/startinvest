<?php

namespace App\Http\Requests;

use App\Enums\VoteTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required', Rule::in(VoteTypeEnum::values())],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
