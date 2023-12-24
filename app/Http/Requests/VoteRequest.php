<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
