<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvestmentRoundRequest;
use App\Http\Requests\UpdateInvestmentRoundRequest;
use App\Http\Requests\InvestInRoundRequest;
use App\Http\Resources\InvestmentRoundResource;
use App\Http\Resources\InvestmentRoundCollection;
use App\Models\InvestmentRound;
use App\Models\Startup;
use App\Services\FinancialTrackingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class InvestmentRoundController extends Controller
{
    protected FinancialTrackingService $financialService;

    public function __construct(FinancialTrackingService $financialService)
    {
        $this->middleware('auth');
        $this->financialService = $financialService;
    }

    public function index(Request $request)
    {
        $query = InvestmentRound::with(['startup', 'stage', 'investments'])
            ->withCount('investments');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('startup', function ($startupQuery) use ($search) {
                      $startupQuery->where('title', 'like', "%{$search}%");
                  });
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $statuses = is_array($request->get('status')) ? $request->get('status') : [$request->get('status')];
            $query->whereIn('status', $statuses);
        }

        // Round type filter
        if ($request->filled('round_type')) {
            $query->where('round_type', $request->get('round_type'));
        }

        // Amount range filter
        if ($request->filled('min_amount')) {
            $query->where('target_amount', '>=', $request->get('min_amount'));
        }
        if ($request->filled('max_amount')) {
            $query->where('target_amount', '<=', $request->get('max_amount'));
        }

        // Stage filter
        if ($request->filled('stage_id')) {
            $query->where('stage_id', $request->get('stage_id'));
        }

        // Deadline filter
        if ($request->filled('deadline_filter')) {
            switch ($request->get('deadline_filter')) {
                case 'ending_soon':
                    $query->where('deadline', '>', now())
                          ->where('deadline', '<=', now()->addDays(7));
                    break;
                case 'this_month':
                    $query->whereBetween('deadline', [now()->startOfMonth(), now()->endOfMonth()]);
                    break;
                case 'expired':
                    $query->where('deadline', '<', now());
                    break;
            }
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        switch ($sortBy) {
            case 'raised_amount':
                $query->orderBy('raised_amount', $sortOrder);
                break;
            case 'target_amount':
                $query->orderBy('target_amount', $sortOrder);
                break;
            case 'progress':
                $query->orderByRaw('(raised_amount / target_amount) ' . $sortOrder);
                break;
            case 'deadline':
                $query->orderBy('deadline', $sortOrder);
                break;
            case 'investors_count':
                $query->orderBy('investments_count', $sortOrder);
                break;
            default:
                $query->orderBy($sortBy, $sortOrder);
                break;
        }

        $rounds = $query->paginate($request->get('per_page', 12));

        if ($request->wantsJson()) {
            return new InvestmentRoundCollection($rounds);
        }

        return Inertia::render('InvestmentRound/Index', [
            'rounds' => new InvestmentRoundCollection($rounds),
            'filters' => $request->only(['search', 'status', 'round_type', 'min_amount', 'max_amount', 'stage_id', 'deadline_filter']),
            'sorting' => $request->only(['sort_by', 'sort_order'])
        ]);
    }

    public function show(InvestmentRound $investmentRound)
    {
        $investmentRound->load([
            'startup.user',
            'stage',
            'investments.investor',
            'documents',
            'updates'
        ]);

        // Get investment statistics
        $investmentStats = $investmentRound->getInvestmentStats();
        
        // Get startup financial summary
        $startupFinancials = $this->financialService->getStartupFinancialSummary($investmentRound->startup);

        // Check if user can invest
        $canInvest = Auth::check() && 
                     Auth::user()->is_investor && 
                     $investmentRound->canAcceptInvestments() &&
                     !$investmentRound->investments()->where('investor_id', Auth::id())->exists();

        if (request()->wantsJson()) {
            return new InvestmentRoundResource($investmentRound->loadMissing([
                'investmentStats' => $investmentStats,
                'startupFinancials' => $startupFinancials,
                'canInvest' => $canInvest
            ]));
        }

        return Inertia::render('InvestmentRound/Show', [
            'round' => new InvestmentRoundResource($investmentRound),
            'investmentStats' => $investmentStats,
            'startupFinancials' => $startupFinancials,
            'canInvest' => $canInvest,
            'userInvestment' => Auth::check() ? $investmentRound->investments()->where('investor_id', Auth::id())->first() : null
        ]);
    }

    public function create(Request $request)
    {
        $this->authorize('create', InvestmentRound::class);

        $startup = null;
        if ($request->filled('startup_id')) {
            $startup = Startup::findOrFail($request->get('startup_id'));
            $this->authorize('update', $startup);
        }

        return Inertia::render('InvestmentRound/Create', [
            'startup' => $startup,
            'stages' => \App\Models\InvestmentStage::active()->orderBy('order_index')->get()
        ]);
    }

    public function store(StoreInvestmentRoundRequest $request)
    {
        $startup = Startup::findOrFail($request->validated('startup_id'));
        $this->authorize('update', $startup);

        try {
            $round = $this->financialService->createInvestmentRound($startup, $request->validated());

            if ($request->wantsJson()) {
                return new InvestmentRoundResource($round);
            }

            return redirect()->route('investment-round.show', $round)
                ->with('success', 'Investment round created successfully');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json(['error' => $e->getMessage()], 400);
            }

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(InvestmentRound $investmentRound)
    {
        $this->authorize('update', $investmentRound);

        $investmentRound->load('startup', 'stage');

        return Inertia::render('InvestmentRound/Edit', [
            'round' => new InvestmentRoundResource($investmentRound),
            'stages' => \App\Models\InvestmentStage::active()->orderBy('order_index')->get()
        ]);
    }

    public function update(UpdateInvestmentRoundRequest $request, InvestmentRound $investmentRound)
    {
        $this->authorize('update', $investmentRound);

        try {
            $investmentRound->update($request->validated());

            if ($request->wantsJson()) {
                return new InvestmentRoundResource($investmentRound->fresh());
            }

            return redirect()->route('investment-round.show', $investmentRound)
                ->with('success', 'Investment round updated successfully');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json(['error' => $e->getMessage()], 400);
            }

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function launch(InvestmentRound $investmentRound)
    {
        $this->authorize('update', $investmentRound);

        try {
            $round = $this->financialService->launchInvestmentRound($investmentRound);

            if (request()->wantsJson()) {
                return new InvestmentRoundResource($round);
            }

            return redirect()->route('investment-round.show', $round)
                ->with('success', 'Investment round launched successfully');
        } catch (\Exception $e) {
            if (request()->wantsJson()) {
                return response()->json(['error' => $e->getMessage()], 400);
            }

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function close(Request $request, InvestmentRound $investmentRound)
    {
        $this->authorize('update', $investmentRound);

        $request->validate([
            'reason' => 'nullable|string|max:1000'
        ]);

        try {
            $investmentRound->close($request->get('reason'));

            if ($request->wantsJson()) {
                return new InvestmentRoundResource($investmentRound->fresh());
            }

            return redirect()->route('investment-round.show', $investmentRound)
                ->with('success', 'Investment round closed successfully');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json(['error' => $e->getMessage()], 400);
            }

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function extend(Request $request, InvestmentRound $investmentRound)
    {
        $this->authorize('update', $investmentRound);

        $request->validate([
            'new_deadline' => 'required|date|after:now',
            'reason' => 'nullable|string|max:1000'
        ]);

        try {
            $newDeadline = new \DateTime($request->get('new_deadline'));
            $investmentRound->extend($newDeadline, $request->get('reason'));

            if ($request->wantsJson()) {
                return new InvestmentRoundResource($investmentRound->fresh());
            }

            return redirect()->route('investment-round.show', $investmentRound)
                ->with('success', 'Investment round deadline extended successfully');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json(['error' => $e->getMessage()], 400);
            }

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function invest(InvestInRoundRequest $request, InvestmentRound $investmentRound)
    {
        if (!Auth::user()->is_investor) {
            if ($request->wantsJson()) {
                return response()->json(['error' => 'Only verified investors can invest'], 403);
            }
            return back()->withErrors(['error' => 'Only verified investors can invest']);
        }

        try {
            $investment = $this->financialService->processInvestment(
                $investmentRound,
                Auth::user(),
                $request->validated('amount'),
                $request->safe(['terms_agreed', 'accredited_investor', 'notes'])
            );

            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Investment processed successfully',
                    'investment' => $investment
                ]);
            }

            return redirect()->route('investment-round.show', $investmentRound)
                ->with('success', 'Your investment has been processed and is pending confirmation');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json(['error' => $e->getMessage()], 400);
            }

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function analytics(InvestmentRound $investmentRound)
    {
        $this->authorize('view', $investmentRound);

        $analytics = [
            'investment_stats' => $investmentRound->getInvestmentStats(),
            'daily_progress' => $this->getDailyProgress($investmentRound),
            'investor_breakdown' => $this->getInvestorBreakdown($investmentRound),
            'geographic_distribution' => $this->getGeographicDistribution($investmentRound),
            'investment_size_distribution' => $this->getInvestmentSizeDistribution($investmentRound)
        ];

        if (request()->wantsJson()) {
            return response()->json($analytics);
        }

        return Inertia::render('InvestmentRound/Analytics', [
            'round' => new InvestmentRoundResource($investmentRound),
            'analytics' => $analytics
        ]);
    }

    // API endpoints for mobile/external access
    public function featured()
    {
        $rounds = InvestmentRound::getFeaturedRounds(6);
        return new InvestmentRoundCollection($rounds);
    }

    public function active()
    {
        $rounds = InvestmentRound::getActiveRounds();
        return new InvestmentRoundCollection($rounds);
    }

    public function endingSoon()
    {
        $rounds = InvestmentRound::getEndingSoonRounds(7);
        return new InvestmentRoundCollection($rounds);
    }

    public function trending(Request $request)
    {
        $rounds = InvestmentRound::active()
            ->with(['startup', 'stage'])
            ->withCount('investments')
            ->orderByDesc('investments_count')
            ->limit($request->get('limit', 10))
            ->get();

        return new InvestmentRoundCollection($rounds);
    }

    protected function getDailyProgress(InvestmentRound $round): array
    {
        return $round->investments()
            ->where('status', '!=', 'cancelled')
            ->selectRaw('DATE(created_at) as date, SUM(amount) as daily_amount, COUNT(*) as daily_count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => $item->date,
                    'amount' => $item->daily_amount,
                    'count' => $item->daily_count
                ];
            })
            ->toArray();
    }

    protected function getInvestorBreakdown(InvestmentRound $round): array
    {
        return $round->investments()
            ->join('users', 'investments.investor_id', '=', 'users.id')
            ->where('investments.status', '!=', 'cancelled')
            ->groupBy('users.investment_experience_years')
            ->selectRaw('users.investment_experience_years as experience_level, COUNT(*) as count, SUM(investments.amount) as total_amount')
            ->get()
            ->map(function ($item) {
                return [
                    'experience_level' => $item->experience_level ? $item->experience_level . ' years' : 'Not specified',
                    'count' => $item->count,
                    'total_amount' => $item->total_amount
                ];
            })
            ->toArray();
    }

    protected function getGeographicDistribution(InvestmentRound $round): array
    {
        return $round->investments()
            ->join('users', 'investments.investor_id', '=', 'users.id')
            ->where('investments.status', '!=', 'cancelled')
            ->groupBy('users.location')
            ->selectRaw('users.location, COUNT(*) as count, SUM(investments.amount) as total_amount')
            ->orderByDesc('total_amount')
            ->get()
            ->map(function ($item) {
                return [
                    'location' => $item->location ?: 'Not specified',
                    'count' => $item->count,
                    'total_amount' => $item->total_amount
                ];
            })
            ->toArray();
    }

    protected function getInvestmentSizeDistribution(InvestmentRound $round): array
    {
        $ranges = [
            ['min' => 0, 'max' => 1000, 'label' => 'Under $1K'],
            ['min' => 1000, 'max' => 5000, 'label' => '$1K - $5K'],
            ['min' => 5000, 'max' => 25000, 'label' => '$5K - $25K'],
            ['min' => 25000, 'max' => 100000, 'label' => '$25K - $100K'],
            ['min' => 100000, 'max' => PHP_FLOAT_MAX, 'label' => 'Over $100K']
        ];

        return collect($ranges)->map(function ($range) use ($round) {
            $query = $round->investments()->where('status', '!=', 'cancelled');
            
            if ($range['max'] !== PHP_FLOAT_MAX) {
                $query->whereBetween('amount', [$range['min'], $range['max']]);
            } else {
                $query->where('amount', '>=', $range['min']);
            }

            return [
                'label' => $range['label'],
                'count' => $query->count(),
                'total_amount' => $query->sum('amount')
            ];
        })->toArray();
    }
}