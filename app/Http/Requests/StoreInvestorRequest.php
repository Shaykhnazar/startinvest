<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreInvestorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            // Basic Profile (Required)
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'bio' => 'nullable|string|max:1000',
            'location' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'linkedin_profile' => 'nullable|url|max:255',
            'twitter_profile' => 'nullable|url|max:255',
            
            // Investment Profile
            'investment_focus' => 'required|string|max:500',
            'investment_stage_focus' => 'nullable|string|max:255',
            'investment_size_min' => 'required|numeric|min:1|max:999999999.99',
            'investment_size_max' => 'required|numeric|min:1|max:999999999.99|gte:investment_size_min',
            'portfolio_size' => 'nullable|integer|min:0|max:1000',
            'investment_experience_years' => 'required|integer|min:0|max:100',
            'notable_investments' => 'nullable|array',
            'notable_investments.*' => 'string|max:255',
            'investment_thesis' => 'nullable|string|max:1000',
            'preferred_contact_method' => 'required|string|in:email,linkedin,phone,website',
            'accepts_unsolicited_pitches' => 'boolean',
            'response_time_days' => 'nullable|integer|min:1|max:365',
            'co_investment_interested' => 'boolean',
            'mentorship_available' => 'boolean',
            
            // Investment Preferences
            'preferred_industries' => 'required|array|min:1',
            'preferred_industries.*' => 'string|max:100',
            'preferred_stages' => 'nullable|array',
            'preferred_stages.*' => 'string|max:50',
            'min_investment_amount' => 'nullable|numeric|min:0|max:999999999.99',
            'max_investment_amount' => 'nullable|numeric|min:0|max:999999999.99|gte:min_investment_amount',
            'preferred_locations' => 'nullable|array',
            'preferred_locations.*' => 'string|max:100',
            'risk_tolerance' => 'required|array|min:1',
            'risk_tolerance.*' => 'string|in:low,medium,high',
            
            // Portfolio Preferences
            'max_portfolio_companies' => 'nullable|integer|min:1|max:1000',
            'target_portfolio_diversification' => 'nullable|numeric|min:0|max:100',
            'exit_timeline_preferences' => 'nullable|array',
            
            // Communication Preferences
            'receive_startup_matches' => 'boolean',
            'receive_market_updates' => 'boolean',
            'receive_portfolio_reports' => 'boolean',
            'notification_frequency' => 'nullable|array',
            
            // Investment Strategy
            'deal_evaluation_criteria' => 'nullable|array',
            'co_investment_willing' => 'boolean',
            'lead_investment_willing' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'investment_size_max.gte' => 'Maximum investment size must be greater than or equal to minimum investment size.',
            'max_investment_amount.gte' => 'Maximum investment amount must be greater than or equal to minimum investment amount.',
            'website.url' => 'Website must be a valid URL.',
            'linkedin_profile.url' => 'LinkedIn profile must be a valid URL.',
            'twitter_profile.url' => 'Twitter profile must be a valid URL.',
            'preferred_industries.required' => 'Please select at least one preferred industry.',
            'preferred_industries.*.string' => 'Each preferred industry must be a valid text value.',
            'preferred_stages.*.string' => 'Each preferred stage must be a valid text value.',
            'risk_tolerance.required' => 'Please select your risk tolerance level.',
            'risk_tolerance.*.in' => 'Risk tolerance must be low, medium, or high.',
            'investment_focus.required' => 'Investment focus is required.',
            'investment_experience_years.required' => 'Years of investment experience is required.',
            'preferred_contact_method.required' => 'Please select your preferred contact method.'
        ];
    }

    public function attributes(): array
    {
        return [
            'investment_size_min' => 'minimum investment size',
            'investment_size_max' => 'maximum investment size', 
            'investment_experience_years' => 'years of investment experience',
            'response_time_days' => 'response time in days',
            'preferred_industries' => 'preferred industries',
            'preferred_stages' => 'preferred stages',
            'min_investment_amount' => 'minimum investment amount',
            'max_investment_amount' => 'maximum investment amount',
            'preferred_locations' => 'preferred locations',
            'max_portfolio_companies' => 'maximum portfolio companies',
            'target_portfolio_diversification' => 'target portfolio diversification',
            'preferred_contact_method' => 'preferred contact method'
        ];
    }

    protected function prepareForValidation(): void
    {
        // Convert string boolean values to actual booleans
        $booleanFields = [
            'accepts_unsolicited_pitches',
            'co_investment_interested',
            'mentorship_available',
            'receive_startup_matches',
            'receive_market_updates', 
            'receive_portfolio_reports',
            'co_investment_willing',
            'lead_investment_willing'
        ];

        $data = $this->all();
        
        foreach ($booleanFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = filter_var($data[$field], FILTER_VALIDATE_BOOLEAN);
            }
        }

        // Set default values for boolean fields if not provided
        $data['accepts_unsolicited_pitches'] = $data['accepts_unsolicited_pitches'] ?? false;
        $data['co_investment_interested'] = $data['co_investment_interested'] ?? false;
        $data['mentorship_available'] = $data['mentorship_available'] ?? false;
        $data['receive_startup_matches'] = $data['receive_startup_matches'] ?? true;
        $data['receive_market_updates'] = $data['receive_market_updates'] ?? true;
        $data['receive_portfolio_reports'] = $data['receive_portfolio_reports'] ?? true;
        $data['co_investment_willing'] = $data['co_investment_willing'] ?? false;
        $data['lead_investment_willing'] = $data['lead_investment_willing'] ?? false;

        // Set investor flag
        $data['is_investor'] = true;
        
        $this->replace($data);
    }

    public function getInvestorData(): array
    {
        return $this->safe([
            'name', 'email', 'bio', 'location', 'company', 'position',
            'website', 'linkedin_profile', 'twitter_profile',
            'investment_focus', 'investment_stage_focus', 'investment_size_min',
            'investment_size_max', 'portfolio_size', 'investment_experience_years',
            'notable_investments', 'investment_thesis', 'preferred_contact_method',
            'accepts_unsolicited_pitches', 'response_time_days',
            'co_investment_interested', 'mentorship_available', 'is_investor'
        ]);
    }

    public function getPreferencesData(): array
    {
        return $this->safe([
            'preferred_industries', 'preferred_stages', 'min_investment_amount',
            'max_investment_amount', 'preferred_locations', 'risk_tolerance',
            'max_portfolio_companies', 'target_portfolio_diversification',
            'exit_timeline_preferences', 'receive_startup_matches',
            'receive_market_updates', 'receive_portfolio_reports',
            'preferred_contact_method', 'notification_frequency',
            'investment_thesis', 'deal_evaluation_criteria',
            'co_investment_willing', 'lead_investment_willing'
        ]);
    }
}