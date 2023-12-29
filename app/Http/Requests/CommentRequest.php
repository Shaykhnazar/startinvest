<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'max:1024'],
            'parent_id' => ['nullable', 'integer', 'exists:comments,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
