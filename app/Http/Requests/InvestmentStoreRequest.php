<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestmentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'startup_id' => 'required|exists:startups,id',
            'investment_stage_id' => 'required|exists:investment_stages,id',
            'amount' => 'required|numeric|min:1|max:999999999.99',
            'equity_percentage' => 'nullable|numeric|min:0|max:100',
            'expected_return' => 'nullable|numeric|min:0',
            'invested_at' => 'nullable|date|before_or_equal:today',
            'currency' => 'nullable|string|size:3|in:USD,EUR,UZS,RUB',
            'notes' => 'nullable|string|max:5000',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'startup_id' => 'startup',
            'investment_stage_id' => 'investment stage',
            'amount' => 'investment amount',
            'equity_percentage' => 'equity percentage',
            'expected_return' => 'expected return',
            'invested_at' => 'investment date',
            'currency' => 'currency',
            'notes' => 'notes',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'startup_id.required' => 'Please select a startup to invest in.',
            'startup_id.exists' => 'The selected startup does not exist.',
            'investment_stage_id.required' => 'Please select an investment stage.',
            'investment_stage_id.exists' => 'The selected investment stage is invalid.',
            'amount.required' => 'Investment amount is required.',
            'amount.numeric' => 'Investment amount must be a valid number.',
            'amount.min' => 'Investment amount must be at least $1.',
            'amount.max' => 'Investment amount cannot exceed $999,999,999.99.',
            'equity_percentage.numeric' => 'Equity percentage must be a valid number.',
            'equity_percentage.min' => 'Equity percentage cannot be negative.',
            'equity_percentage.max' => 'Equity percentage cannot exceed 100%.',
            'expected_return.numeric' => 'Expected return must be a valid number.',
            'expected_return.min' => 'Expected return cannot be negative.',
            'invested_at.date' => 'Investment date must be a valid date.',
            'invested_at.before_or_equal' => 'Investment date cannot be in the future.',
            'currency.size' => 'Currency code must be exactly 3 characters.',
            'currency.in' => 'Currency must be one of: USD, EUR, UZS, RUB.',
            'notes.max' => 'Notes cannot exceed 5000 characters.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Convert percentage to decimal if needed
        if ($this->filled('equity_percentage') && $this->equity_percentage > 1) {
            $this->merge([
                'equity_percentage' => $this->equity_percentage / 100,
            ]);
        }

        // Set default currency if not provided
        if (!$this->filled('currency')) {
            $this->merge([
                'currency' => 'USD',
            ]);
        }

        // Set default investment date to today if not provided
        if (!$this->filled('invested_at')) {
            $this->merge([
                'invested_at' => now()->toDateString(),
            ]);
        }
    }
}