<?php

namespace App\Http\Controllers;

use App\Http\Resources\StartupResource;
use App\Http\Resources\InvestorResource;
use App\Http\Resources\InvestmentRoundResource;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SearchController extends Controller
{
    protected SearchService $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index(Request $request)
    {
        $query = $request->get('q', '');
        $filters = $request->only([
            'industries', 'stages', 'location', 'funding_status',
            'min_funding', 'max_funding', 'sort_by', 'sort_order'
        ]);

        if (empty($query) && empty(array_filter($filters))) {
            return Inertia::render('Search/Index', [
                'query' => $query,
                'results' => null,
                'filters' => $filters,
                'filter_options' => $this->searchService->getFilterOptions()
            ]);
        }

        $results = $this->searchService->globalSearch($query, $filters, 12);

        if ($request->wantsJson()) {
            return response()->json([
                'query' => $query,
                'results' => [
                    'startups' => StartupResource::collection($results['startups']),
                    'investors' => InvestorResource::collection($results['investors']),
                    'investment_rounds' => InvestmentRoundResource::collection($results['investment_rounds']),
                    'total_results' => $results['total_results']
                ],
                'filters' => $filters
            ]);
        }

        return Inertia::render('Search/Index', [
            'query' => $query,
            'results' => [
                'startups' => StartupResource::collection($results['startups']),
                'investors' => InvestorResource::collection($results['investors']),
                'investment_rounds' => InvestmentRoundResource::collection($results['investment_rounds']),
                'total_results' => $results['total_results']
            ],
            'filters' => $filters,
            'filter_options' => $this->searchService->getFilterOptions()
        ]);
    }

    public function startups(Request $request)
    {
        $query = $request->get('q', '');
        $filters = $request->only([
            'industries', 'stages', 'location', 'funding_status',
            'min_funding', 'max_funding', 'has_mvp', 'verified',
            'sort_by', 'sort_order'
        ]);

        $results = $this->searchService->searchStartups($query, $filters, $request->get('per_page', 12));

        if ($request->wantsJson()) {
            return StartupResource::collection($results);
        }

        return Inertia::render('Search/Startups', [
            'query' => $query,
            'startups' => StartupResource::collection($results),
            'filters' => $filters,
            'filter_options' => $this->searchService->getFilterOptions()
        ]);
    }

    public function investors(Request $request)
    {
        $query = $request->get('q', '');
        $filters = $request->only([
            'investment_focus', 'min_investment_size', 'max_investment_size',
            'experience_years', 'location', 'verified', 'accepting_pitches',
            'mentorship_available', 'preferred_industries', 'preferred_stages',
            'sort_by', 'sort_order'
        ]);

        $results = $this->searchService->searchInvestors($query, $filters, $request->get('per_page', 12));

        if ($request->wantsJson()) {
            return InvestorResource::collection($results);
        }

        return Inertia::render('Search/Investors', [
            'query' => $query,
            'investors' => InvestorResource::collection($results),
            'filters' => $filters,
            'filter_options' => $this->searchService->getFilterOptions()
        ]);
    }

    public function investmentRounds(Request $request)
    {
        $query = $request->get('q', '');
        $filters = $request->only([
            'status', 'round_types', 'min_target', 'max_target', 'stages',
            'industries', 'deadline_filter', 'min_investment', 'max_investment',
            'accredited_only', 'location', 'sort_by', 'sort_order'
        ]);

        $results = $this->searchService->searchInvestmentRounds($query, $filters, $request->get('per_page', 12));

        if ($request->wantsJson()) {
            return InvestmentRoundResource::collection($results);
        }

        return Inertia::render('Search/InvestmentRounds', [
            'query' => $query,
            'investment_rounds' => InvestmentRoundResource::collection($results),
            'filters' => $filters,
            'filter_options' => $this->searchService->getFilterOptions()
        ]);
    }

    public function suggestions(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:2|max:100'
        ]);

        $query = $request->get('q');
        $suggestions = $this->searchService->getSearchSuggestions($query, 5);

        return response()->json($suggestions);
    }

    public function advanced(Request $request)
    {
        $request->validate([
            'criteria' => 'required|array',
            'criteria.entity_types' => 'required|array',
            'criteria.entity_types.*' => 'in:startups,investors,investment_rounds',
            'criteria.query' => 'nullable|string|max:255',
            'criteria.per_page' => 'nullable|integer|min:1|max:100'
        ]);

        $criteria = $request->get('criteria');
        $results = $this->searchService->advancedSearch($criteria);

        if ($request->wantsJson()) {
            return response()->json([
                'results' => $results->map(function ($item) {
                    if ($item instanceof \App\Models\Startup) {
                        return new StartupResource($item);
                    } elseif ($item instanceof \App\Models\User && $item->is_investor) {
                        return new InvestorResource($item);
                    } elseif ($item instanceof \App\Models\InvestmentRound) {
                        return new InvestmentRoundResource($item);
                    }
                    return $item;
                }),
                'total_count' => $results->count(),
                'criteria' => $criteria
            ]);
        }

        return Inertia::render('Search/Advanced', [
            'results' => $results->map(function ($item) {
                if ($item instanceof \App\Models\Startup) {
                    return new StartupResource($item);
                } elseif ($item instanceof \App\Models\User && $item->is_investor) {
                    return new InvestorResource($item);
                } elseif ($item instanceof \App\Models\InvestmentRound) {
                    return new InvestmentRoundResource($item);
                }
                return $item;
            }),
            'criteria' => $criteria,
            'filter_options' => $this->searchService->getFilterOptions()
        ]);
    }

    public function filterOptions()
    {
        $options = $this->searchService->getFilterOptions();
        return response()->json($options);
    }

    public function saveSearch(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Authentication required'], 401);
        }

        $request->validate([
            'query' => 'required|string|max:255',
            'filters' => 'nullable|array',
            'name' => 'nullable|string|max:100'
        ]);

        $this->searchService->saveSearch(
            Auth::id(),
            $request->get('query'),
            $request->get('filters', [])
        );

        return response()->json(['message' => 'Search saved successfully']);
    }

    public function recentSearches(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Authentication required'], 401);
        }

        $searches = $this->searchService->getRecentSearches(Auth::id(), $request->get('limit', 10));
        return response()->json($searches);
    }

    // API endpoints for external access
    public function apiSearch(Request $request)
    {
        $query = $request->get('q', '');
        $filters = $request->only([
            'industries', 'stages', 'location', 'entity_type',
            'sort_by', 'sort_order', 'per_page'
        ]);

        $entityType = $request->get('entity_type', 'all');

        switch ($entityType) {
            case 'startups':
                $results = $this->searchService->searchStartups($query, $filters, $request->get('per_page', 20));
                return StartupResource::collection($results);

            case 'investors':
                $results = $this->searchService->searchInvestors($query, $filters, $request->get('per_page', 20));
                return InvestorResource::collection($results);

            case 'investment_rounds':
                $results = $this->searchService->searchInvestmentRounds($query, $filters, $request->get('per_page', 20));
                return InvestmentRoundResource::collection($results);

            default:
                $results = $this->searchService->globalSearch($query, $filters, 20);
                return response()->json([
                    'startups' => StartupResource::collection($results['startups']),
                    'investors' => InvestorResource::collection($results['investors']),
                    'investment_rounds' => InvestmentRoundResource::collection($results['investment_rounds']),
                    'total_results' => $results['total_results']
                ]);
        }
    }

    public function apiSuggestions(Request $request)
    {
        $query = $request->get('q', '');
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        return response()->json(
            $this->searchService->getSearchSuggestions($query, $request->get('limit', 5))
        );
    }
}