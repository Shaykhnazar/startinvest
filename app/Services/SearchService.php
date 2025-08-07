<?php

namespace App\Services;

use App\Models\User;
use App\Models\Startup;
use App\Models\Investment;
use App\Models\InvestmentRound;
use App\Models\InvestmentStage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SearchService
{
    public function globalSearch(string $query, array $filters = [], int $perPage = 12): array
    {
        $results = [
            'startups' => $this->searchStartups($query, $filters, 6),
            'investors' => $this->searchInvestors($query, $filters, 6),
            'investment_rounds' => $this->searchInvestmentRounds($query, $filters, 6),
            'total_results' => 0
        ];

        $results['total_results'] = $results['startups']->total() + 
                                   $results['investors']->total() + 
                                   $results['investment_rounds']->total();

        return $results;
    }

    public function searchStartups(string $query = null, array $filters = [], int $perPage = 12): LengthAwarePaginator
    {
        $builder = Startup::query()->with(['owner', 'investments', 'investmentRounds']);

        // Text search
        if ($query) {
            $builder->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('additional_information', 'like', "%{$query}%")
                  ->orWhere('industry', 'like', "%{$query}%");
            });
        }

        // Industry filter
        if (!empty($filters['industries'])) {
            $builder->whereIn('industry', $filters['industries']);
        }

        // Funding status filter
        if (!empty($filters['funding_status'])) {
            switch ($filters['funding_status']) {
                case 'seeking':
                    $builder->whereHas('investmentRounds', function ($q) {
                        $q->where('status', 'active');
                    });
                    break;
                case 'funded':
                    $builder->whereHas('investments');
                    break;
                case 'not_seeking':
                    $builder->whereDoesntHave('investmentRounds', function ($q) {
                        $q->where('status', 'active');
                    });
                    break;
            }
        }

        // Funding amount range
        if (!empty($filters['min_funding']) || !empty($filters['max_funding'])) {
            $builder->whereHas('investmentRounds', function ($q) use ($filters) {
                if (!empty($filters['min_funding'])) {
                    $q->where('target_amount', '>=', $filters['min_funding']);
                }
                if (!empty($filters['max_funding'])) {
                    $q->where('target_amount', '<=', $filters['max_funding']);
                }
            });
        }

        // Investment stage filter
        if (!empty($filters['stages'])) {
            $builder->whereHas('investmentRounds.stage', function ($q) use ($filters) {
                $q->whereIn('slug', $filters['stages']);
            });
        }

        // Location filter
        if (!empty($filters['location'])) {
            $builder->where('location', 'like', "%{$filters['location']}%");
        }

        // MVP status filter
        if (isset($filters['has_mvp'])) {
            $builder->where('has_mvp', $filters['has_mvp']);
        }

        // Verified status filter
        if (isset($filters['verified'])) {
            $builder->where('verified', $filters['verified']);
        }

        // Sorting
        $sortBy = $filters['sort_by'] ?? 'created_at';
        $sortOrder = $filters['sort_order'] ?? 'desc';

        switch ($sortBy) {
            case 'funding_raised':
                $builder->withSum('investments as total_raised', 'amount')
                        ->orderBy('total_raised', $sortOrder);
                break;
            case 'investment_count':
                $builder->withCount('investments')
                        ->orderBy('investments_count', $sortOrder);
                break;
            case 'title':
                $builder->orderBy('title', $sortOrder);
                break;
            case 'created_at':
            default:
                $builder->orderBy('created_at', $sortOrder);
                break;
        }

        return $builder->paginate($perPage);
    }

    public function searchInvestors(string $query = null, array $filters = [], int $perPage = 12): LengthAwarePaginator
    {
        $builder = User::where('is_investor', true)
            ->with(['investments', 'investorPreferences']);

        // Text search
        if ($query) {
            $builder->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('bio', 'like', "%{$query}%")
                  ->orWhere('company', 'like', "%{$query}%")
                  ->orWhere('investment_focus', 'like', "%{$query}%")
                  ->orWhere('investment_thesis', 'like', "%{$query}%");
            });
        }

        // Investment focus filter
        if (!empty($filters['investment_focus'])) {
            $builder->where('investment_focus', 'like', "%{$filters['investment_focus']}%");
        }

        // Investment size range
        if (!empty($filters['min_investment_size']) || !empty($filters['max_investment_size'])) {
            $builder->where(function ($q) use ($filters) {
                if (!empty($filters['min_investment_size'])) {
                    $q->where('investment_size_max', '>=', $filters['min_investment_size']);
                }
                if (!empty($filters['max_investment_size'])) {
                    $q->where('investment_size_min', '<=', $filters['max_investment_size']);
                }
            });
        }

        // Experience level filter
        if (!empty($filters['experience_years'])) {
            $builder->where('investment_experience_years', '>=', $filters['experience_years']);
        }

        // Location filter
        if (!empty($filters['location'])) {
            $builder->where('location', 'like', "%{$filters['location']}%");
        }

        // Verified status filter
        if (isset($filters['verified'])) {
            $builder->where('is_verified', $filters['verified']);
        }

        // Accepting pitches filter
        if (isset($filters['accepting_pitches'])) {
            $builder->where('accepts_unsolicited_pitches', $filters['accepting_pitches']);
        }

        // Mentorship available filter
        if (isset($filters['mentorship_available'])) {
            $builder->where('mentorship_available', $filters['mentorship_available']);
        }

        // Industry preferences filter
        if (!empty($filters['preferred_industries'])) {
            $builder->whereHas('investorPreferences', function ($q) use ($filters) {
                foreach ($filters['preferred_industries'] as $industry) {
                    $q->whereJsonContains('preferred_industries', $industry);
                }
            });
        }

        // Stage preferences filter
        if (!empty($filters['preferred_stages'])) {
            $builder->whereHas('investorPreferences', function ($q) use ($filters) {
                foreach ($filters['preferred_stages'] as $stage) {
                    $q->whereJsonContains('preferred_stages', $stage);
                }
            });
        }

        // Sorting
        $sortBy = $filters['sort_by'] ?? 'created_at';
        $sortOrder = $filters['sort_order'] ?? 'desc';

        switch ($sortBy) {
            case 'investment_count':
                $builder->withCount('investments')
                        ->orderBy('investments_count', $sortOrder);
                break;
            case 'total_invested':
                $builder->withSum('investments as total_invested', 'amount')
                        ->orderBy('total_invested', $sortOrder);
                break;
            case 'name':
                $builder->orderBy('name', $sortOrder);
                break;
            case 'experience':
                $builder->orderBy('investment_experience_years', $sortOrder);
                break;
            case 'created_at':
            default:
                $builder->orderBy('created_at', $sortOrder);
                break;
        }

        return $builder->paginate($perPage);
    }

    public function searchInvestmentRounds(string $query = null, array $filters = [], int $perPage = 12): LengthAwarePaginator
    {
        $builder = InvestmentRound::with(['startup', 'stage', 'investments']);

        // Text search
        if ($query) {
            $builder->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('round_type', 'like', "%{$query}%")
                  ->orWhereHas('startup', function ($startupQuery) use ($query) {
                      $startupQuery->where('title', 'like', "%{$query}%")
                                  ->orWhere('industry', 'like', "%{$query}%");
                  });
            });
        }

        // Status filter
        if (!empty($filters['status'])) {
            $statuses = is_array($filters['status']) ? $filters['status'] : [$filters['status']];
            $builder->whereIn('status', $statuses);
        }

        // Round type filter
        if (!empty($filters['round_types'])) {
            $builder->whereIn('round_type', $filters['round_types']);
        }

        // Target amount range
        if (!empty($filters['min_target']) || !empty($filters['max_target'])) {
            if (!empty($filters['min_target'])) {
                $builder->where('target_amount', '>=', $filters['min_target']);
            }
            if (!empty($filters['max_target'])) {
                $builder->where('target_amount', '<=', $filters['max_target']);
            }
        }

        // Investment stage filter
        if (!empty($filters['stages'])) {
            $builder->whereHas('stage', function ($q) use ($filters) {
                $q->whereIn('slug', $filters['stages']);
            });
        }

        // Industry filter (through startup)
        if (!empty($filters['industries'])) {
            $builder->whereHas('startup', function ($q) use ($filters) {
                $q->whereIn('industry', $filters['industries']);
            });
        }

        // Deadline filter
        if (!empty($filters['deadline_filter'])) {
            switch ($filters['deadline_filter']) {
                case 'ending_soon':
                    $builder->where('deadline', '>', now())
                            ->where('deadline', '<=', now()->addDays(7));
                    break;
                case 'this_month':
                    $builder->whereBetween('deadline', [now()->startOfMonth(), now()->endOfMonth()]);
                    break;
                case 'active_only':
                    $builder->where('status', 'active')
                            ->where('deadline', '>', now());
                    break;
            }
        }

        // Minimum investment filter
        if (!empty($filters['min_investment'])) {
            $builder->where('min_investment', '<=', $filters['min_investment']);
        }

        // Maximum investment filter
        if (!empty($filters['max_investment'])) {
            $builder->where('max_investment', '>=', $filters['max_investment'])
                    ->orWhereNull('max_investment');
        }

        // Accredited only filter
        if (isset($filters['accredited_only'])) {
            $builder->where('is_accredited_only', $filters['accredited_only']);
        }

        // Geographic restrictions filter
        if (!empty($filters['location'])) {
            $builder->where(function ($q) use ($filters) {
                $q->whereJsonContains('geographical_restrictions', $filters['location'])
                  ->orWhereNull('geographical_restrictions')
                  ->orWhere('geographical_restrictions', '[]');
            });
        }

        // Sorting
        $sortBy = $filters['sort_by'] ?? 'created_at';
        $sortOrder = $filters['sort_order'] ?? 'desc';

        switch ($sortBy) {
            case 'target_amount':
                $builder->orderBy('target_amount', $sortOrder);
                break;
            case 'raised_amount':
                $builder->orderBy('raised_amount', $sortOrder);
                break;
            case 'progress':
                $builder->orderByRaw('(raised_amount / target_amount) ' . $sortOrder);
                break;
            case 'deadline':
                $builder->orderBy('deadline', $sortOrder);
                break;
            case 'investors_count':
                $builder->withCount('investments')
                        ->orderBy('investments_count', $sortOrder);
                break;
            case 'created_at':
            default:
                $builder->orderBy('created_at', $sortOrder);
                break;
        }

        return $builder->paginate($perPage);
    }

    public function getSearchSuggestions(string $query, int $limit = 10): array
    {
        $suggestions = [];

        // Startup suggestions
        $startups = Startup::where('title', 'like', "%{$query}%")
            ->limit($limit)
            ->pluck('title')
            ->toArray();

        // Industry suggestions
        $industries = Startup::where('industry', 'like', "%{$query}%")
            ->distinct()
            ->limit($limit)
            ->pluck('industry')
            ->filter()
            ->toArray();

        // Investor suggestions
        $investors = User::where('is_investor', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('company', 'like', "%{$query}%");
            })
            ->limit($limit)
            ->get(['name', 'company'])
            ->map(function ($investor) {
                return $investor->company ? "{$investor->name} ({$investor->company})" : $investor->name;
            })
            ->toArray();

        // Investment round suggestions
        $rounds = InvestmentRound::where('name', 'like', "%{$query}%")
            ->limit($limit)
            ->pluck('name')
            ->toArray();

        return [
            'startups' => array_slice($startups, 0, $limit),
            'industries' => array_slice($industries, 0, $limit),
            'investors' => array_slice($investors, 0, $limit),
            'investment_rounds' => array_slice($rounds, 0, $limit)
        ];
    }

    public function getFilterOptions(): array
    {
        return [
            'industries' => $this->getUniqueIndustries(),
            'stages' => $this->getInvestmentStages(),
            'round_types' => $this->getRoundTypes(),
            'locations' => $this->getUniqueLocations(),
            'funding_ranges' => $this->getFundingRanges(),
            'investment_ranges' => $this->getInvestmentRanges()
        ];
    }

    public function advancedSearch(array $criteria): Collection
    {
        $results = collect();

        // Multi-model search based on criteria
        if (!empty($criteria['entity_types'])) {
            foreach ($criteria['entity_types'] as $entityType) {
                switch ($entityType) {
                    case 'startups':
                        $results = $results->merge($this->searchStartups(
                            $criteria['query'] ?? null,
                            $criteria,
                            $criteria['per_page'] ?? 50
                        )->items());
                        break;
                    case 'investors':
                        $results = $results->merge($this->searchInvestors(
                            $criteria['query'] ?? null,
                            $criteria,
                            $criteria['per_page'] ?? 50
                        )->items());
                        break;
                    case 'investment_rounds':
                        $results = $results->merge($this->searchInvestmentRounds(
                            $criteria['query'] ?? null,
                            $criteria,
                            $criteria['per_page'] ?? 50
                        )->items());
                        break;
                }
            }
        }

        // Apply cross-entity filters
        if (!empty($criteria['cross_filters'])) {
            $results = $this->applyCrossEntityFilters($results, $criteria['cross_filters']);
        }

        return $results;
    }

    public function getRecentSearches(int $userId, int $limit = 10): array
    {
        // This would typically be stored in a searches table
        // For now, return empty array
        return [];
    }

    public function saveSearch(int $userId, string $query, array $filters = []): void
    {
        // This would save the search for later retrieval
        // Implementation depends on requirements
    }

    protected function getUniqueIndustries(): array
    {
        return Startup::distinct()
            ->whereNotNull('industry')
            ->pluck('industry')
            ->filter()
            ->sort()
            ->values()
            ->toArray();
    }

    protected function getInvestmentStages(): array
    {
        return InvestmentStage::active()
            ->orderBy('order_index')
            ->get(['id', 'name', 'slug'])
            ->map(function ($stage) {
                return [
                    'value' => $stage->slug,
                    'label' => $stage->name,
                    'id' => $stage->id
                ];
            })
            ->toArray();
    }

    protected function getRoundTypes(): array
    {
        return [
            ['value' => 'pre_seed', 'label' => 'Pre-Seed'],
            ['value' => 'seed', 'label' => 'Seed'],
            ['value' => 'series_a', 'label' => 'Series A'],
            ['value' => 'series_b', 'label' => 'Series B'],
            ['value' => 'series_c', 'label' => 'Series C'],
            ['value' => 'series_d', 'label' => 'Series D'],
            ['value' => 'bridge', 'label' => 'Bridge'],
            ['value' => 'convertible', 'label' => 'Convertible Note'],
            ['value' => 'equity', 'label' => 'Equity']
        ];
    }

    protected function getUniqueLocations(): array
    {
        $startupLocations = Startup::distinct()
            ->whereNotNull('location')
            ->pluck('location')
            ->filter();

        $investorLocations = User::where('is_investor', true)
            ->distinct()
            ->whereNotNull('location')
            ->pluck('location')
            ->filter();

        return $startupLocations->merge($investorLocations)
            ->unique()
            ->sort()
            ->values()
            ->toArray();
    }

    protected function getFundingRanges(): array
    {
        return [
            ['value' => '0-10000', 'label' => 'Under $10K'],
            ['value' => '10000-50000', 'label' => '$10K - $50K'],
            ['value' => '50000-250000', 'label' => '$50K - $250K'],
            ['value' => '250000-1000000', 'label' => '$250K - $1M'],
            ['value' => '1000000-5000000', 'label' => '$1M - $5M'],
            ['value' => '5000000-25000000', 'label' => '$5M - $25M'],
            ['value' => '25000000-100000000', 'label' => '$25M - $100M'],
            ['value' => '100000000+', 'label' => 'Over $100M']
        ];
    }

    protected function getInvestmentRanges(): array
    {
        return [
            ['value' => '0-1000', 'label' => 'Under $1K'],
            ['value' => '1000-5000', 'label' => '$1K - $5K'],
            ['value' => '5000-25000', 'label' => '$5K - $25K'],
            ['value' => '25000-100000', 'label' => '$25K - $100K'],
            ['value' => '100000-500000', 'label' => '$100K - $500K'],
            ['value' => '500000+', 'label' => 'Over $500K']
        ];
    }

    protected function applyCrossEntityFilters(Collection $results, array $filters): Collection
    {
        // Apply filters that work across different entity types
        foreach ($filters as $filter => $value) {
            switch ($filter) {
                case 'has_funding':
                    $results = $results->filter(function ($item) use ($value) {
                        if ($item instanceof Startup) {
                            return $value ? $item->investments()->count() > 0 : $item->investments()->count() === 0;
                        }
                        return true;
                    });
                    break;
                case 'verified_only':
                    $results = $results->filter(function ($item) use ($value) {
                        if ($item instanceof Startup) {
                            return !$value || $item->verified;
                        } elseif ($item instanceof User) {
                            return !$value || $item->is_verified;
                        }
                        return true;
                    });
                    break;
            }
        }

        return $results;
    }
}