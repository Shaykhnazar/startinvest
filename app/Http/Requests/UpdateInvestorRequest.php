<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateInvestorRequest extends FormRequest
{
    public function authorize(): bool
    {
        $investor = $this->route('investor');
        return Auth::id() === $investor->id || Auth::user()->hasRole('admin');
    }

    public function rules(): array
    {
        return [
            // Profile Information
            'profile.bio' => 'nullable|string|max:1000',
            'profile.location' => 'nullable|string|max:255',
            'profile.company' => 'nullable|string|max:255',
            'profile.position' => 'nullable|string|max:255',
            'profile.website' => 'nullable|url|max:255',
            'profile.linkedin_profile' => 'nullable|url|max:255',
            'profile.twitter_profile' => 'nullable|url|max:255',
            
            // Investment Profile
            'profile.investment_focus' => 'nullable|string|max:500',
            'profile.investment_stage_focus' => 'nullable|string|max:255',
            'profile.investment_size_min' => 'nullable|numeric|min:0|max:999999999.99',
            'profile.investment_size_max' => 'nullable|numeric|min:0|max:999999999.99|gte:profile.investment_size_min',
            'profile.portfolio_size' => 'nullable|integer|min:0|max:1000',
            'profile.investment_experience_years' => 'nullable|integer|min:0|max:100',
            'profile.notable_investments' => 'nullable|array',
            'profile.notable_investments.*' => 'string|max:255',
            'profile.investment_thesis' => 'nullable|string|max:1000',
            'profile.preferred_contact_method' => 'nullable|string|in:email,linkedin,phone,website',
            'profile.accepts_unsolicited_pitches' => 'boolean',
            'profile.response_time_days' => 'nullable|integer|min:1|max:365',
            'profile.co_investment_interested' => 'boolean',
            'profile.mentorship_available' => 'boolean',
            
            // Investment Preferences
            'preferences.preferred_industries' => 'nullable|array',
            'preferences.preferred_industries.*' => 'string|max:100',
            'preferences.preferred_stages' => 'nullable|array',
            'preferences.preferred_stages.*' => 'string|max:50',
            'preferences.min_investment_amount' => 'nullable|numeric|min:0|max:999999999.99',
            'preferences.max_investment_amount' => 'nullable|numeric|min:0|max:999999999.99|gte:preferences.min_investment_amount',
            'preferences.preferred_locations' => 'nullable|array',
            'preferences.preferred_locations.*' => 'string|max:100',
            'preferences.risk_tolerance' => 'nullable|array',
            'preferences.risk_tolerance.*' => 'string|in:low,medium,high',
            
            // Portfolio Preferences
            'preferences.max_portfolio_companies' => 'nullable|integer|min:1|max:1000',
            'preferences.target_portfolio_diversification' => 'nullable|numeric|min:0|max:100',
            'preferences.exit_timeline_preferences' => 'nullable|array',
            
            // Communication Preferences
            'preferences.receive_startup_matches' => 'boolean',
            'preferences.receive_market_updates' => 'boolean',
            'preferences.receive_portfolio_reports' => 'boolean',
            'preferences.preferred_contact_method' => 'nullable|string|in:email,phone,linkedin,website',
            'preferences.notification_frequency' => 'nullable|array',
            
            // Investment Strategy
            'preferences.investment_thesis' => 'nullable|string|max:2000',
            'preferences.deal_evaluation_criteria' => 'nullable|array',
            'preferences.co_investment_willing' => 'boolean',
            'preferences.lead_investment_willing' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'profile.investment_size_max.gte' => 'Maximum investment size must be greater than or equal to minimum investment size.',
            'preferences.max_investment_amount.gte' => 'Maximum investment amount must be greater than or equal to minimum investment amount.',
            'profile.website.url' => 'Website must be a valid URL.',
            'profile.linkedin_profile.url' => 'LinkedIn profile must be a valid URL.',
            'profile.twitter_profile.url' => 'Twitter profile must be a valid URL.',
            'preferences.preferred_industries.*.string' => 'Each preferred industry must be a valid text value.',
            'preferences.preferred_stages.*.string' => 'Each preferred stage must be a valid text value.',
            'preferences.risk_tolerance.*.in' => 'Risk tolerance must be low, medium, or high.',
        ];
    }

    public function attributes(): array
    {
        return [
            'profile.bio' => 'biography',
            'profile.investment_size_min' => 'minimum investment size',
            'profile.investment_size_max' => 'maximum investment size',
            'profile.investment_experience_years' => 'years of investment experience',
            'profile.response_time_days' => 'response time in days',
            'preferences.preferred_industries' => 'preferred industries',
            'preferences.preferred_stages' => 'preferred stages',
            'preferences.min_investment_amount' => 'minimum investment amount',
            'preferences.max_investment_amount' => 'maximum investment amount',
            'preferences.preferred_locations' => 'preferred locations',
            'preferences.max_portfolio_companies' => 'maximum portfolio companies',
            'preferences.target_portfolio_diversification' => 'target portfolio diversification'
        ];
    }

    protected function prepareForValidation(): void
    {
        // Convert string boolean values to actual booleans
        $profile = $this->input('profile', []);
        $preferences = $this->input('preferences', []);

        $booleanFields = [
            'accepts_unsolicited_pitches',
            'co_investment_interested', 
            'mentorship_available'
        ];

        foreach ($booleanFields as $field) {
            if (isset($profile[$field])) {
                $profile[$field] = filter_var($profile[$field], FILTER_VALIDATE_BOOLEAN);
            }
        }

        $preferenceBooleanFields = [
            'receive_startup_matches',
            'receive_market_updates',
            'receive_portfolio_reports',
            'co_investment_willing',
            'lead_investment_willing'
        ];

        foreach ($preferenceBooleanFields as $field) {
            if (isset($preferences[$field])) {
                $preferences[$field] = filter_var($preferences[$field], FILTER_VALIDATE_BOOLEAN);
            }
        }

        $this->merge([
            'profile' => $profile,
            'preferences' => $preferences
        ]);
    }

    public function safe(array $keys = null): array
    {
        $safe = parent::safe($keys);
        
        // Ensure arrays are properly handled
        if (isset($safe['preferences']['preferred_industries']) && is_string($safe['preferences']['preferred_industries'])) {
            $safe['preferences']['preferred_industries'] = explode(',', $safe['preferences']['preferred_industries']);
        }
        
        if (isset($safe['preferences']['preferred_stages']) && is_string($safe['preferences']['preferred_stages'])) {
            $safe['preferences']['preferred_stages'] = explode(',', $safe['preferences']['preferred_stages']);
        }
        
        if (isset($safe['preferences']['preferred_locations']) && is_string($safe['preferences']['preferred_locations'])) {
            $safe['preferences']['preferred_locations'] = explode(',', $safe['preferences']['preferred_locations']);
        }
        
        return $safe;
    }
}