<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvestorRequest;
use App\Http\Requests\UpdateInvestorRequest;
use App\Http\Resources\InvestorResource;
use App\Http\Resources\InvestorCollection;
use App\Models\User;
use App\Models\Startup;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class InvestorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = User::where('is_investor', true)
            ->with(['investments', 'investorPreferences'])
            ->withCount('investments');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('bio', 'like', "%{$search}%");
            });
        }

        // Industry filter
        if ($request->filled('industries')) {
            $industries = $request->get('industries');
            $query->whereHas('investorPreferences', function ($q) use ($industries) {
                $q->whereJsonContains('preferred_industries', $industries);
            });
        }

        // Investment range filter
        if ($request->filled('min_investment') || $request->filled('max_investment')) {
            $query->whereHas('investorPreferences', function ($q) use ($request) {
                if ($request->filled('min_investment')) {
                    $q->where('max_investment_amount', '>=', $request->get('min_investment'));
                }
                if ($request->filled('max_investment')) {
                    $q->where('min_investment_amount', '<=', $request->get('max_investment'));
                }
            });
        }

        // Location filter
        if ($request->filled('location')) {
            $location = $request->get('location');
            $query->whereHas('investorPreferences', function ($q) use ($location) {
                $q->whereJsonContains('preferred_locations', $location);
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        switch ($sortBy) {
            case 'investments_count':
                $query->orderBy('investments_count', $sortOrder);
                break;
            case 'name':
                $query->orderBy('name', $sortOrder);
                break;
            case 'total_invested':
                $query->withSum('investments', 'amount')
                      ->orderBy('investments_sum_amount', $sortOrder);
                break;
            default:
                $query->orderBy($sortBy, $sortOrder);
                break;
        }

        $investors = $query->paginate($request->get('per_page', 12));

        if ($request->wantsJson()) {
            return new InvestorCollection($investors);
        }

        return Inertia::render('Investor/Directory', [
            'investors' => new InvestorCollection($investors),
            'filters' => $request->only(['search', 'industries', 'min_investment', 'max_investment', 'location']),
            'sorting' => $request->only(['sort_by', 'sort_order'])
        ]);
    }

    public function show(User $investor)
    {
        abort_unless($investor->is_investor, 404);

        $investor->load([
            'investments.startup',
            'investorPreferences',
            'portfolioTracking.startup'
        ]);

        // Portfolio analytics
        $portfolioStats = [
            'total_investments' => $investor->investments()->count(),
            'total_invested' => $investor->investments()->sum('amount'),
            'active_investments' => $investor->investments()->where('status', 'active')->count(),
            'portfolio_companies' => $investor->investments()->distinct('startup_id')->count(),
            'average_investment' => $investor->investments()->avg('amount'),
            'portfolio_roi' => $investor->calculatePortfolioROI(),
            'risk_score' => $investor->calculateRiskScore(),
            'diversification_score' => $investor->calculateDiversificationScore()
        ];

        // Recent activity
        $recentInvestments = $investor->investments()
            ->with('startup')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Industry breakdown
        $industryBreakdown = $investor->investments()
            ->join('startups', 'investments.startup_id', '=', 'startups.id')
            ->select('startups.industry', DB::raw('SUM(investments.amount) as total'))
            ->groupBy('startups.industry')
            ->get();

        if (request()->wantsJson()) {
            return new InvestorResource($investor->loadMissing([
                'portfolioStats' => $portfolioStats,
                'recentInvestments' => $recentInvestments,
                'industryBreakdown' => $industryBreakdown
            ]));
        }

        return Inertia::render('Investor/Profile', [
            'investor' => new InvestorResource($investor),
            'portfolioStats' => $portfolioStats,
            'recentInvestments' => $recentInvestments,
            'industryBreakdown' => $industryBreakdown,
            'canEdit' => Auth::id() === $investor->id || Auth::user()->hasRole('admin')
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        abort_unless($user->is_investor, 403);

        $user->load([
            'investments.startup',
            'investorPreferences',
            'portfolioTracking.startup'
        ]);

        // Dashboard metrics
        $metrics = [
            'total_investments' => $user->investments()->count(),
            'total_invested' => $user->investments()->sum('amount'),
            'active_investments' => $user->investments()->where('status', 'active')->count(),
            'pending_investments' => $user->investments()->where('status', 'pending')->count(),
            'portfolio_value' => $user->portfolioTracking()->sum('current_valuation'),
            'total_returns' => $user->portfolioTracking()->sum('realized_return'),
            'portfolio_roi' => $user->calculatePortfolioROI(),
            'monthly_roi_trend' => $user->getMonthlyROITrend()
        ];

        // Recent activity
        $recentActivity = $user->investments()
            ->with('startup')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Portfolio performance
        $portfolioPerformance = $user->portfolioTracking()
            ->with('startup')
            ->orderBy('roi_percentage', 'desc')
            ->get();

        // Recommended startups
        $recommendations = $user->getInvestmentRecommendations(5);

        return Inertia::render('Investor/Dashboard', [
            'metrics' => $metrics,
            'recentActivity' => $recentActivity,
            'portfolioPerformance' => $portfolioPerformance,
            'recommendations' => $recommendations
        ]);
    }

    public function edit(User $investor)
    {
        $this->authorize('update', $investor);
        abort_unless($investor->is_investor, 404);

        $investor->load('investorPreferences');

        return Inertia::render('Investor/Edit', [
            'investor' => new InvestorResource($investor)
        ]);
    }

    public function update(UpdateInvestorRequest $request, User $investor)
    {
        $this->authorize('update', $investor);
        abort_unless($investor->is_investor, 404);

        DB::transaction(function () use ($request, $investor) {
            // Update investor profile
            $investor->update($request->safe(['profile']));

            // Update or create preferences
            if ($request->has('preferences')) {
                $investor->investorPreferences()->updateOrCreate(
                    ['investor_id' => $investor->id],
                    $request->safe(['preferences'])
                );
            }
        });

        if ($request->wantsJson()) {
            return new InvestorResource($investor->fresh(['investorPreferences']));
        }

        return redirect()->route('investor.show', $investor)
            ->with('success', 'Profile updated successfully');
    }

    public function portfolio(User $investor)
    {
        abort_unless($investor->is_investor, 404);
        $this->authorize('view', $investor);

        $portfolio = $investor->portfolioTracking()
            ->with(['startup', 'investment'])
            ->orderBy('investment_date', 'desc')
            ->paginate(20);

        $portfolioSummary = [
            'total_investments' => $portfolio->total(),
            'total_invested' => $investor->investments()->sum('amount'),
            'current_value' => $portfolio->sum('current_valuation'),
            'total_returns' => $portfolio->sum('realized_return'),
            'average_roi' => $portfolio->avg('roi_percentage'),
            'best_performer' => $portfolio->sortByDesc('roi_percentage')->first(),
            'worst_performer' => $portfolio->sortBy('roi_percentage')->first()
        ];

        return Inertia::render('Investor/Portfolio', [
            'portfolio' => $portfolio,
            'summary' => $portfolioSummary,
            'investor' => new InvestorResource($investor)
        ]);
    }

    public function analytics(User $investor)
    {
        abort_unless($investor->is_investor, 404);
        $this->authorize('view', $investor);

        $analytics = $investor->getPortfolioAnalytics();

        return Inertia::render('Investor/Analytics', [
            'analytics' => $analytics,
            'investor' => new InvestorResource($investor)
        ]);
    }

    public function recommendations()
    {
        $user = Auth::user();
        abort_unless($user->is_investor, 403);

        $recommendations = $user->getInvestmentRecommendations(20);
        
        return Inertia::render('Investor/Recommendations', [
            'recommendations' => $recommendations
        ]);
    }

    public function matching(Request $request)
    {
        $user = Auth::user();
        abort_unless($user->is_investor, 403);

        $query = Startup::where('is_seeking_investment', true)
            ->with(['user', 'investments']);

        // Apply matching algorithm based on investor preferences
        if ($user->investorPreferences) {
            $preferences = $user->investorPreferences;
            
            if ($preferences->preferred_industries) {
                $query->whereIn('industry', $preferences->preferred_industries);
            }
            
            if ($preferences->preferred_stages) {
                $query->whereIn('stage', $preferences->preferred_stages);
            }
            
            if ($preferences->min_investment_amount) {
                $query->where('funding_goal', '>=', $preferences->min_investment_amount);
            }
            
            if ($preferences->max_investment_amount) {
                $query->where('funding_goal', '<=', $preferences->max_investment_amount);
            }
        }

        // Calculate match scores
        $startups = $query->get()->map(function ($startup) use ($user) {
            $startup->match_score = $user->calculateMatchScore($startup);
            return $startup;
        })->sortByDesc('match_score');

        return Inertia::render('Investor/Matching', [
            'startups' => $startups->values(),
            'user' => $user
        ]);
    }

    public function exportPortfolio(User $investor)
    {
        abort_unless($investor->is_investor, 404);
        $this->authorize('view', $investor);

        $portfolioData = $investor->portfolioTracking()
            ->with(['startup', 'investment'])
            ->get();

        return response()->json([
            'investor' => $investor->only(['name', 'email']),
            'portfolio' => $portfolioData,
            'summary' => [
                'total_investments' => $portfolioData->count(),
                'total_invested' => $investor->investments()->sum('amount'),
                'current_value' => $portfolioData->sum('current_valuation'),
                'total_returns' => $portfolioData->sum('realized_return'),
                'portfolio_roi' => $investor->calculatePortfolioROI()
            ],
            'generated_at' => now()->toISOString()
        ]);
    }
}
