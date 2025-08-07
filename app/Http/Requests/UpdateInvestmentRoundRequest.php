<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateInvestmentRoundRequest extends FormRequest
{
    public function authorize(): bool
    {
        $round = $this->route('investmentRound');
        return Auth::check() && Auth::user()->can('update', $round);
    }

    public function rules(): array
    {
        $round = $this->route('investmentRound');
        
        // Don't allow changes to critical fields if round is active and has investments
        $hasInvestments = $round && $round->investments()->count() > 0;
        $isActive = $round && in_array($round->status, ['active', 'open']);
        
        return [
            // Basic Information (can be updated unless active with investments)
            'name' => 'sometimes|string|max:255',
            'round_type' => $hasInvestments ? 'sometimes|in:' . $round->round_type : 'sometimes|string|in:pre_seed,seed,series_a,series_b,series_c,series_d,bridge,convertible,equity',
            
            // Financial Details (restricted if has investments)
            'target_amount' => $hasInvestments ? 'sometimes|numeric|min:' . $round->raised_amount : 'sometimes|numeric|min:1000|max:999999999999.99',
            'min_investment' => $hasInvestments ? 'sometimes|numeric|max:' . $round->min_investment : 'sometimes|numeric|min:1|max:999999999999.99',
            'max_investment' => 'sometimes|nullable|numeric|min:1|max:999999999999.99|gte:min_investment',
            
            // Valuation (restricted if active)
            'price_per_share' => $isActive ? 'sometimes|numeric|in:' . $round->price_per_share : 'sometimes|nullable|numeric|min:0.0001|max:999999999.9999',
            'pre_money_valuation' => $isActive ? 'sometimes|numeric|in:' . $round->pre_money_valuation : 'sometimes|nullable|numeric|min:1|max:999999999999.99',
            'post_money_valuation' => $isActive ? 'sometimes|numeric|in:' . $round->post_money_valuation : 'sometimes|nullable|numeric|min:1|max:999999999999.99|gte:pre_money_valuation',
            'total_shares' => $isActive ? 'sometimes|integer|in:' . $round->total_shares : 'sometimes|nullable|integer|min:1|max:999999999999',
            'shares_offered' => $isActive ? 'sometimes|integer|in:' . $round->shares_offered : 'sometimes|nullable|integer|min:1|max:999999999999|lte:total_shares',
            
            // Timeline (can extend deadline, but not shorten if active)
            'deadline' => $isActive && $round->deadline ? 
                'sometimes|nullable|date|after:' . $round->deadline->toDateString() . '|before:' . now()->addYears(2)->toDateString() :
                'sometimes|nullable|date|after:now|before:' . now()->addYears(2)->toDateString(),
            
            // Content (always updatable)
            'description' => 'sometimes|nullable|string|max:5000',
            'terms_summary' => 'sometimes|nullable|string|max:2000',
            'use_of_funds' => 'sometimes|nullable|array',
            'use_of_funds.*.category' => 'required_with:use_of_funds|string|max:100',
            'use_of_funds.*.percentage' => 'required_with:use_of_funds|numeric|min:0|max:100',
            'use_of_funds.*.description' => 'nullable|string|max:500',
            
            // Investor Benefits (always updatable)
            'investor_perks' => 'sometimes|nullable|array',
            'investor_perks.*' => 'string|max:255',
            
            // Requirements (always updatable)
            'required_documents' => 'sometimes|nullable|array',
            'required_documents.*' => 'string|max:255',
            'risk_factors' => 'sometimes|nullable|array',
            'risk_factors.*' => 'string|max:500',
            
            // Legal Structure (restricted if active)
            'legal_structure' => $isActive ? 'sometimes|in:' . $round->legal_structure : 'sometimes|nullable|string|in:llc,corporation,partnership,sole_proprietorship',
            'securities_type' => $isActive ? 'sometimes|in:' . $round->securities_type : 'sometimes|nullable|string|in:common_stock,preferred_stock,convertible_note,safe,warrant',
            'minimum_commitment' => 'sometimes|nullable|numeric|min:1|max:999999999999.99',
            'is_accredited_only' => 'sometimes|boolean',
            'geographical_restrictions' => 'sometimes|nullable|array',
            'geographical_restrictions.*' => 'string|max:100',
            
            // Fees (restricted if active)
            'success_fee_percentage' => $isActive ? 'sometimes|numeric|in:' . $round->success_fee_percentage : 'sometimes|nullable|numeric|min:0|max:50',
            'platform_fee' => $isActive ? 'sometimes|numeric|in:' . $round->platform_fee : 'sometimes|nullable|numeric|min:0|max:999999999.99',
            
            // Notes (always updatable)
            'notes' => 'sometimes|nullable|string|max:2000'
        ];
    }

    public function messages(): array
    {
        $round = $this->route('investmentRound');
        $hasInvestments = $round && $round->investments()->count() > 0;
        $isActive = $round && in_array($round->status, ['active', 'open']);

        $messages = [
            'name.string' => 'Investment round name must be text.',
            'target_amount.min' => $hasInvestments ? 
                'Target amount cannot be less than already raised amount.' : 
                'Target amount must be at least $1,000.',
            'min_investment.max' => $hasInvestments ? 
                'Minimum investment cannot be increased once investments are received.' : 
                'Minimum investment is too high.',
            'max_investment.gte' => 'Maximum investment must be greater than or equal to minimum investment.',
            'deadline.after' => $isActive ? 
                'New deadline must be after current deadline.' : 
                'Deadline must be in the future.',
            'deadline.before' => 'Deadline cannot be more than 2 years from now.',
            'post_money_valuation.gte' => 'Post-money valuation must be greater than or equal to pre-money valuation.',
            'shares_offered.lte' => 'Shares offered cannot exceed total shares.',
            'use_of_funds.*.percentage.max' => 'Use of funds percentage cannot exceed 100%.',
            'success_fee_percentage.max' => 'Success fee cannot exceed 50%.'
        ];

        if ($isActive) {
            $messages = array_merge($messages, [
                'price_per_share.in' => 'Price per share cannot be changed once round is active.',
                'pre_money_valuation.in' => 'Pre-money valuation cannot be changed once round is active.',
                'post_money_valuation.in' => 'Post-money valuation cannot be changed once round is active.',
                'total_shares.in' => 'Total shares cannot be changed once round is active.',
                'shares_offered.in' => 'Shares offered cannot be changed once round is active.',
                'legal_structure.in' => 'Legal structure cannot be changed once round is active.',
                'securities_type.in' => 'Securities type cannot be changed once round is active.',
                'success_fee_percentage.in' => 'Success fee cannot be changed once round is active.',
                'platform_fee.in' => 'Platform fee cannot be changed once round is active.'
            ]);
        }

        return $messages;
    }

    public function attributes(): array
    {
        return [
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
        // Convert boolean strings to actual booleans
        if ($this->has('is_accredited_only')) {
            $this->merge([
                'is_accredited_only' => filter_var($this->get('is_accredited_only'), FILTER_VALIDATE_BOOLEAN)
            ]);
        }
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
                $targetAmount = $this->get('target_amount') ?? $this->route('investmentRound')->target_amount;
                $expectedPostMoney = $this->get('pre_money_valuation') + $targetAmount;
                
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