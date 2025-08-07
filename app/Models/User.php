<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Platform\Models\User as Authenticatable;
use App\Services\InvestorService;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permissions',
        'avatar',
        'bio',
        'location',
        'company',
        'position',
        'website',
        'linkedin_profile',
        'twitter_profile',
        'is_investor',
        'is_verified',
        'investment_focus',
        'investment_stage_focus',
        'investment_size_min',
        'investment_size_max',
        'portfolio_size',
        'investment_experience_years',
        'notable_investments',
        'investment_thesis',
        'preferred_contact_method',
        'accepts_unsolicited_pitches',
        'response_time_days',
        'co_investment_interested',
        'mentorship_available',
        'last_active_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
        'is_investor'          => 'boolean',
        'is_verified'          => 'boolean',
        'accepts_unsolicited_pitches' => 'boolean',
        'co_investment_interested' => 'boolean',
        'mentorship_available' => 'boolean',
        'investment_size_min'  => 'decimal:2',
        'investment_size_max'  => 'decimal:2',
        'notable_investments'  => 'array',
        'last_active_at'       => 'datetime'
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
       'id'         => Where::class,
       'name'       => Like::class,
       'email'      => Like::class,
       'updated_at' => WhereDateStartEnd::class,
       'created_at' => WhereDateStartEnd::class,
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at',
    ];

    /**
     * Get all the socials for the User
     *
     * @return HasMany
     */
    public function socials(): HasMany
    {
        return $this->hasMany(Social::class);
    }

    public function investor(): HasOne
    {
        return $this->hasOne(Investor::class, 'user_id');
    }

    public function details(): HasOne
    {
        return $this->hasOne(UserDetail::class, 'user_id');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class, 'user_id');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function sentMessages()
    {
        return $this->hasMany(ChatMessage::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(ChatMessage::class, 'receiver_id');
    }

    public function joinRequests(): HasMany
    {
        return $this->hasMany(StartupJoinRequest::class, 'user_id');
    }

    public function contributedStartups(): BelongsToMany
    {
        return $this->belongsToMany(Startup::class, 'startup_contributor', 'contributor_id', 'startup_id');
    }

    public function socialProfiles(): HasMany
    {
        return $this->hasMany(UserSocialProfile::class, 'user_id');
    }

    public function investments(): HasMany
    {
        return $this->hasMany(Investment::class, 'investor_id');
    }

    public function investorPreferences(): HasOne
    {
        return $this->hasOne(InvestorPreferences::class, 'investor_id');
    }

    public function portfolioTracking(): HasMany
    {
        return $this->hasMany(PortfolioTracking::class, 'investor_id');
    }

    // Investor-specific methods
    public function calculatePortfolioROI(): float
    {
        $tracking = $this->portfolioTracking;
        
        if ($tracking->isEmpty()) {
            return 0.0;
        }
        
        $totalInvested = $tracking->sum('initial_investment');
        $totalReturns = $tracking->sum(function ($track) {
            return $track->current_valuation + $track->realized_return;
        });
        
        if ($totalInvested <= 0) {
            return 0.0;
        }
        
        return (($totalReturns - $totalInvested) / $totalInvested) * 100;
    }

    public function calculateRiskScore(): float
    {
        $tracking = $this->portfolioTracking;
        
        if ($tracking->isEmpty()) {
            return 5.0; // Medium risk baseline
        }
        
        return $tracking->avg('risk_score') ?? 5.0;
    }

    public function calculateDiversificationScore(): float
    {
        $investments = $this->investments()->with('startup')->get();
        
        if ($investments->isEmpty()) {
            return 0.0;
        }
        
        $industries = $investments->pluck('startup.industry')->filter()->unique();
        $stages = $investments->pluck('startup.stage')->filter()->unique();
        $totalInvestments = $investments->count();
        
        $industryDiversity = $industries->count() / max(1, $totalInvestments);
        $stageDiversity = $stages->count() / max(1, $totalInvestments);
        
        return (($industryDiversity + $stageDiversity) / 2) * 100;
    }

    public function getPortfolioAnalytics(): array
    {
        $service = app(InvestorService::class);
        return $service->calculatePortfolioAnalytics($this);
    }

    public function getInvestmentRecommendations(int $limit = 10): Collection
    {
        $service = app(InvestorService::class);
        return $service->calculateInvestmentRecommendations($this, $limit);
    }

    public function calculateMatchScore(Startup $startup): float
    {
        $service = app(InvestorService::class);
        return $service->calculateMatchScore($this, $startup, $this->investorPreferences);
    }

    public function getMonthlyROITrend(): array
    {
        // Mock implementation - would calculate actual monthly ROI trends
        return [
            ['month' => 'Jan', 'roi' => 5.2],
            ['month' => 'Feb', 'roi' => 7.8],
            ['month' => 'Mar', 'roi' => 12.1],
            ['month' => 'Apr', 'roi' => 15.6],
            ['month' => 'May', 'roi' => 18.3],
            ['month' => 'Jun', 'roi' => 22.4]
        ];
    }

    public function isQualifiedFor(Startup $startup): bool
    {
        $preferences = $this->investorPreferences;
        
        if (!$preferences) {
            return true; // No restrictions
        }
        
        // Check industry match
        if ($preferences->preferred_industries && $startup->industry) {
            if (!in_array($startup->industry, $preferences->preferred_industries)) {
                return false;
            }
        }
        
        // Check stage match
        if ($preferences->preferred_stages && $startup->stage) {
            if (!in_array($startup->stage, $preferences->preferred_stages)) {
                return false;
            }
        }
        
        // Check investment amount
        if ($startup->funding_goal) {
            if (!$preferences->isAmountInRange($startup->funding_goal)) {
                return false;
            }
        }
        
        return true;
    }

    // Scopes
    public function scopeInvestors($query)
    {
        return $query->where('is_investor', true);
    }

    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    public function scopeAcceptingPitches($query)
    {
        return $query->where('accepts_unsolicited_pitches', true);
    }

    public function scopeOfferingMentorship($query)
    {
        return $query->where('mentorship_available', true);
    }

    public function scopeInterestedInCoInvestment($query)
    {
        return $query->where('co_investment_interested', true);
    }

//    public function roles()
//    {
//        return $this->belongsToMany(Role::class, 'role_users');
//    }

    public function getAuthPasswordName()
    {
        return 'password';
    }

    public function scopeHasRole($query, $role)
    {
        if (!$role) {
            return $query;
        }

        return $query->whereHas('roles', function ($query) use ($role) {
            $query->where('roles.slug', $role)->orWhere('roles.id', $role);
        });
    }

    public function checkRole($roles)
    {
        if (!$roles) {
            return null;
        }

        return $this->roles->whereIn('slug', $roles)->first();
    }

}
