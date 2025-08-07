<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InvestInRoundRequest extends FormRequest
{
    public function authorize(): bool
    {
        $round = $this->route('investmentRound');
        return Auth::check() && 
               Auth::user()->is_investor && 
               $round->canAcceptInvestments() &&
               !$round->investments()->where('investor_id', Auth::id())->exists();
    }

    public function rules(): array
    {
        $round = $this->route('investmentRound');
        
        return [
            'amount' => [
                'required',
                'numeric',
                'min:' . ($round->min_investment ?? 1),
                $round->max_investment ? 'max:' . $round->max_investment : 'max:999999999999.99',
                function ($attribute, $value, $fail) use ($round) {
                    // Check if investment would exceed target amount
                    $remainingAmount = $round->target_amount - $round->raised_amount;
                    if ($value > $remainingAmount) {
                        $fail("Investment amount cannot exceed remaining target amount of $" . number_format($remainingAmount, 2));
                    }
                },
            ],
            'terms_agreed' => 'required|accepted',
            'accredited_investor' => $round->is_accredited_only ? 'required|accepted' : 'sometimes|boolean',
            'risk_acknowledgment' => 'required|accepted',
            'notes' => 'nullable|string|max:1000'
        ];
    }

    public function messages(): array
    {
        $round = $this->route('investmentRound');
        
        return [
            'amount.required' => 'Investment amount is required.',
            'amount.numeric' => 'Investment amount must be a valid number.',
            'amount.min' => 'Investment amount must be at least $' . number_format($round->min_investment ?? 1, 2),
            'amount.max' => $round->max_investment ? 
                'Investment amount cannot exceed $' . number_format($round->max_investment, 2) :
                'Investment amount is too large.',
            'terms_agreed.required' => 'You must agree to the investment terms.',
            'terms_agreed.accepted' => 'You must agree to the investment terms.',
            'accredited_investor.required' => 'You must confirm your accredited investor status.',
            'accredited_investor.accepted' => 'You must be an accredited investor to participate in this round.',
            'risk_acknowledgment.required' => 'You must acknowledge the investment risks.',
            'risk_acknowledgment.accepted' => 'You must acknowledge the investment risks.',
            'notes.max' => 'Notes cannot exceed 1000 characters.'
        ];
    }

    public function attributes(): array
    {
        return [
            'terms_agreed' => 'terms agreement',
            'accredited_investor' => 'accredited investor status',
            'risk_acknowledgment' => 'risk acknowledgment',
        ];
    }

    protected function prepareForValidation(): void
    {
        // Convert boolean strings to actual booleans
        $booleanFields = ['terms_agreed', 'accredited_investor', 'risk_acknowledgment'];
        
        foreach ($booleanFields as $field) {
            if ($this->has($field)) {
                $this->merge([
                    $field => filter_var($this->get($field), FILTER_VALIDATE_BOOLEAN)
                ]);
            }
        }
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $round = $this->route('investmentRound');
            $user = Auth::user();
            
            // Check geographic restrictions
            if ($round->geographical_restrictions && 
                !empty($round->geographical_restrictions) && 
                $user->location) {
                
                $allowedLocations = $round->geographical_restrictions;
                $userCountry = $this->extractCountry($user->location);
                
                if (!in_array($userCountry, $allowedLocations)) {
                    $validator->errors()->add('geographic_restriction', 
                        'This investment round is not available in your location.');
                }
            }
            
            // Check minimum commitment period (if user has investment_experience_years)
            if ($round->minimum_commitment && 
                $user->investment_experience_years !== null && 
                $user->investment_experience_years < 1) {
                
                $validator->errors()->add('experience_requirement', 
                    'This investment round requires at least 1 year of investment experience.');
            }
            
            // Check if user has sufficient information in profile
            if (!$user->investment_focus || !$user->investment_experience_years) {
                $validator->errors()->add('profile_incomplete', 
                    'Please complete your investor profile before investing.');
            }
            
            // Additional validation for large investments (> $100K)
            if ($this->get('amount') > 100000) {
                if (!$user->is_verified) {
                    $validator->errors()->add('verification_required', 
                        'Large investments require verified investor status.');
                }
            }
        });
    }

    protected function extractCountry(string $location): string
    {
        // Simple country extraction - in production, use a proper geocoding service
        $countries = [
            'US' => ['United States', 'USA', 'US'],
            'CA' => ['Canada', 'CA'],
            'UK' => ['United Kingdom', 'UK', 'Britain'],
            'DE' => ['Germany', 'DE'],
            'FR' => ['France', 'FR'],
            'UZ' => ['Uzbekistan', 'UZ']
            // Add more countries as needed
        ];
        
        foreach ($countries as $code => $variants) {
            foreach ($variants as $variant) {
                if (stripos($location, $variant) !== false) {
                    return $code;
                }
            }
        }
        
        // Default to country code extracted from end of location string
        $parts = explode(',', $location);
        return strtoupper(trim(end($parts)));
    }
}