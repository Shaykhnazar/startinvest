<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreInvestmentRoundRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            // Basic Information
            'startup_id' => 'required|exists:startups,id',
            'stage_id' => 'nullable|exists:investment_stages,id',
            'name' => 'required|string|max:255',
            'round_type' => 'required|string|in:pre_seed,seed,series_a,series_b,series_c,series_d,bridge,convertible,equity',
            
            // Financial Details
            'target_amount' => 'required|numeric|min:1000|max:999999999999.99',
            'min_investment' => 'required|numeric|min:1|max:999999999999.99|lte:target_amount',
            'max_investment' => 'nullable|numeric|min:1|max:999999999999.99|gte:min_investment',
            
            // Valuation
            'price_per_share' => 'nullable|numeric|min:0.0001|max:999999999.9999',
            'pre_money_valuation' => 'nullable|numeric|min:1|max:999999999999.99',
            'post_money_valuation' => 'nullable|numeric|min:1|max:999999999999.99|gte:pre_money_valuation',
            'total_shares' => 'nullable|integer|min:1|max:999999999999',
            'shares_offered' => 'nullable|integer|min:1|max:999999999999|lte:total_shares',
            
            // Timeline
            'deadline' => 'nullable|date|after:now|before:' . now()->addYears(2)->toDateString(),
            
            // Content
            'description' => 'nullable|string|max:5000',
            'terms_summary' => 'nullable|string|max:2000',
            'use_of_funds' => 'nullable|array',
            'use_of_funds.*.category' => 'required_with:use_of_funds|string|max:100',
            'use_of_funds.*.percentage' => 'required_with:use_of_funds|numeric|min:0|max:100',
            'use_of_funds.*.description' => 'nullable|string|max:500',
            
            // Investor Benefits
            'investor_perks' => 'nullable|array',
            'investor_perks.*' => 'string|max:255',
            
            // Requirements
            'required_documents' => 'nullable|array',
            'required_documents.*' => 'string|max:255',
            'risk_factors' => 'nullable|array',
            'risk_factors.*' => 'string|max:500',
            
            // Legal Structure
            'legal_structure' => 'nullable|string|in:llc,corporation,partnership,sole_proprietorship',
            'securities_type' => 'nullable|string|in:common_stock,preferred_stock,convertible_note,safe,warrant',
            'minimum_commitment' => 'nullable|numeric|min:1|max:999999999999.99',
            'is_accredited_only' => 'boolean',
            'geographical_restrictions' => 'nullable|array',
            'geographical_restrictions.*' => 'string|max:100',
            
            // Fees
            'success_fee_percentage' => 'nullable|numeric|min:0|max:50',
            'platform_fee' => 'nullable|numeric|min:0|max:999999999.99',
            
            // Notes
            'notes' => 'nullable|string|max:2000'
        ];
    }

    public function messages(): array
    {
        return [
            'startup_id.required' => 'Please select a startup for this investment round.',
            'startup_id.exists' => 'The selected startup does not exist.',
            'name.required' => 'Investment round name is required.',
            'round_type.required' => 'Please select the type of investment round.',
            'round_type.in' => 'Invalid investment round type selected.',
            'target_amount.required' => 'Target funding amount is required.',
            'target_amount.min' => 'Target amount must be at least $1,000.',
            'min_investment.required' => 'Minimum investment amount is required.',
            'min_investment.lte' => 'Minimum investment cannot exceed target amount.',
            'max_investment.gte' => 'Maximum investment must be greater than or equal to minimum investment.',
            'deadline.after' => 'Deadline must be in the future.',
            'deadline.before' => 'Deadline cannot be more than 2 years from now.',
            'post_money_valuation.gte' => 'Post-money valuation must be greater than or equal to pre-money valuation.',
            'shares_offered.lte' => 'Shares offered cannot exceed total shares.',
            'use_of_funds.*.percentage.max' => 'Use of funds percentage cannot exceed 100%.',
            'success_fee_percentage.max' => 'Success fee cannot exceed 50%.'
        ];
    }

    public function attributes(): array
    {
        return [
            'startup_id' => 'startup',
            'stage_id' => 'investment stage',
            'round_type' => 'round type',
            'target_amount' => 'target amount',
            'min_investment' => 'minimum investment',
            'max_investment' => 'maximum investment',
            'price_per_share' => 'price per share',
            'pre_money_valuation' => 'pre-money valuation',
            'post_money_valuation' => 'post-money valuation',
            'total_shares' => 'total shares',
            'shares_offered' => 'shares offered',
            'terms_summary' => 'terms summary',
            'use_of_funds' => 'use of funds',
            'investor_perks' => 'investor perks',
            'required_documents' => 'required documents',
            'risk_factors' => 'risk factors',
            'legal_structure' => 'legal structure',
            'securities_type' => 'securities type',
            'minimum_commitment' => 'minimum commitment',
            'is_accredited_only' => 'accredited investors only',
            'geographical_restrictions' => 'geographical restrictions',
            'success_fee_percentage' => 'success fee percentage',
            'platform_fee' => 'platform fee'
        ];
    }

    protected function prepareForValidation(): void
    {
        // Ensure use_of_funds percentages add up to 100%
        if ($this->has('use_of_funds') && is_array($this->get('use_of_funds'))) {
            $totalPercentage = collect($this->get('use_of_funds'))
                ->sum('percentage');
            
            if ($totalPercentage > 100) {
                $this->merge([
                    'use_of_funds_total_error' => 'Use of funds percentages cannot exceed 100%'
                ]);
            }
        }

        // Convert boolean strings to actual booleans
        if ($this->has('is_accredited_only')) {
            $this->merge([
                'is_accredited_only' => filter_var($this->get('is_accredited_only'), FILTER_VALIDATE_BOOLEAN)
            ]);
        }

        // Set default status
        $this->merge(['status' => 'draft']);
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            // Validate use of funds total percentage
            if ($this->has('use_of_funds') && is_array($this->get('use_of_funds'))) {
                $totalPercentage = collect($this->get('use_of_funds'))
                    ->sum('percentage');
                
                if ($totalPercentage > 100) {
                    $validator->errors()->add('use_of_funds', 'Use of funds percentages cannot exceed 100%');
                } elseif ($totalPercentage < 100 && count($this->get('use_of_funds')) > 1) {
                    $validator->errors()->add('use_of_funds', 'Use of funds percentages should add up to 100%');
                }
            }

            // Validate valuation consistency
            if ($this->filled(['pre_money_valuation', 'target_amount'])) {
                $expectedPostMoney = $this->get('pre_money_valuation') + $this->get('target_amount');
                
                if ($this->filled('post_money_valuation') && 
                    abs($this->get('post_money_valuation') - $expectedPostMoney) > 1000) {
                    $validator->errors()->add('post_money_valuation', 
                        'Post-money valuation should equal pre-money valuation plus target amount');
                }
            }

            // Validate shares consistency
            if ($this->filled(['price_per_share', 'target_amount', 'shares_offered'])) {
                $expectedAmount = $this->get('price_per_share') * $this->get('shares_offered');
                
                if (abs($expectedAmount - $this->get('target_amount')) > 1000) {
                    $validator->errors()->add('shares_offered', 
                        'Shares offered multiplied by price per share should equal target amount');
                }
            }
        });
    }
}