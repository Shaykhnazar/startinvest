<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestmentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $investment = $this->route('investment');
        
        return auth()->check() && (
            $investment->investor_id === auth()->id() || 
            auth()->user()->hasRole(['admin', 'moderator'])
        );
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'startup_id' => 'sometimes|exists:startups,id',
            'investment_stage_id' => 'sometimes|exists:investment_stages,id',
            'amount' => 'sometimes|numeric|min:1|max:999999999.99',
            'equity_percentage' => 'nullable|numeric|min:0|max:100',
            'expected_return' => 'nullable|numeric|min:0',
            'actual_return' => 'nullable|numeric|min:0',
            'invested_at' => 'nullable|date|before_or_equal:today',
            'exit_date' => 'nullable|date|after_or_equal:invested_at',
            'status' => 'sometimes|in:pending,approved,active,completed,cancelled,exited',
            'currency' => 'sometimes|string|size:3|in:USD,EUR,UZS,RUB',
            'notes' => 'nullable|string|max:5000',
            'due_diligence_completed' => 'sometimes|boolean',
            'contract_signed' => 'sometimes|boolean',
            'payment_confirmed' => 'sometimes|boolean',
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
            'actual_return' => 'actual return',
            'invested_at' => 'investment date',
            'exit_date' => 'exit date',
            'status' => 'investment status',
            'currency' => 'currency',
            'notes' => 'notes',
            'due_diligence_completed' => 'due diligence status',
            'contract_signed' => 'contract status',
            'payment_confirmed' => 'payment status',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'startup_id.exists' => 'The selected startup does not exist.',
            'investment_stage_id.exists' => 'The selected investment stage is invalid.',
            'amount.numeric' => 'Investment amount must be a valid number.',
            'amount.min' => 'Investment amount must be at least $1.',
            'amount.max' => 'Investment amount cannot exceed $999,999,999.99.',
            'equity_percentage.numeric' => 'Equity percentage must be a valid number.',
            'equity_percentage.min' => 'Equity percentage cannot be negative.',
            'equity_percentage.max' => 'Equity percentage cannot exceed 100%.',
            'expected_return.numeric' => 'Expected return must be a valid number.',
            'expected_return.min' => 'Expected return cannot be negative.',
            'actual_return.numeric' => 'Actual return must be a valid number.',
            'actual_return.min' => 'Actual return cannot be negative.',
            'invested_at.date' => 'Investment date must be a valid date.',
            'invested_at.before_or_equal' => 'Investment date cannot be in the future.',
            'exit_date.date' => 'Exit date must be a valid date.',
            'exit_date.after_or_equal' => 'Exit date must be after or equal to investment date.',
            'status.in' => 'Investment status must be one of: pending, approved, active, completed, cancelled, exited.',
            'currency.size' => 'Currency code must be exactly 3 characters.',
            'currency.in' => 'Currency must be one of: USD, EUR, UZS, RUB.',
            'notes.max' => 'Notes cannot exceed 5000 characters.',
            'due_diligence_completed.boolean' => 'Due diligence status must be true or false.',
            'contract_signed.boolean' => 'Contract status must be true or false.',
            'payment_confirmed.boolean' => 'Payment status must be true or false.',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $investment = $this->route('investment');
            
            // Validate exit date is not before investment date
            if ($this->filled('exit_date') && $investment->invested_at) {
                if ($this->exit_date < $investment->invested_at->toDateString()) {
                    $validator->errors()->add('exit_date', 'Exit date cannot be before the investment date.');
                }
            }
            
            // Validate actual return is provided when status is exited
            if ($this->filled('status') && $this->status === 'exited' && !$this->filled('actual_return')) {
                $validator->errors()->add('actual_return', 'Actual return is required when marking investment as exited.');
            }
            
            // Validate exit date is provided when status is exited
            if ($this->filled('status') && $this->status === 'exited' && !$this->filled('exit_date')) {
                $validator->errors()->add('exit_date', 'Exit date is required when marking investment as exited.');
            }
        });
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
    }
}