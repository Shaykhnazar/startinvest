<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvestmentResource;
use App\Http\Requests\InvestmentStoreRequest;
use App\Http\Requests\InvestmentUpdateRequest;
use App\Models\Investment;
use App\Models\Startup;
use App\Models\InvestmentStage;
use App\Services\InvestmentService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;

class InvestmentController extends Controller
{
    public function __construct(
        private InvestmentService $investmentService
    ) {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Display a listing of investments
     */
    public function index(Request $request): Response
    {
        $query = Investment::with(['startup', 'investor', 'investmentStage'])
            ->when($request->user()->hasRole('investor'), function ($query) use ($request) {
                return $query->where('investor_id', $request->user()->id);
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                return $query->byStatus($request->status);
            })
            ->when($request->filled('startup_id'), function ($query) use ($request) {
                return $query->byStartup($request->startup_id);
            })
            ->when($request->filled('min_amount'), function ($query) use ($request) {
                return $query->where('amount', '>=', $request->min_amount);
            })
            ->when($request->filled('max_amount'), function ($query) use ($request) {
                return $query->where('amount', '<=', $request->max_amount);
            })
            ->when($request->filled('search'), function ($query) use ($request) {
                return $query->whereHas('startup', function ($q) use ($request) {
                    $q->where('title->en', 'like', "%{$request->search}%")
                      ->orWhere('title->ru', 'like', "%{$request->search}%")
                      ->orWhere('title->uz_Latn', 'like', "%{$request->search}%");
                });
            })
            ->latest();

        $investments = $query->paginate(15)->withQueryString();

        return Inertia::render('Investment/Index', [
            'investments' => InvestmentResource::collection($investments),
            'filters' => $request->only(['status', 'startup_id', 'min_amount', 'max_amount', 'search']),
            'stats' => $this->investmentService->getInvestmentStats($request->user()),
        ]);
    }

    /**
     * Show the form for creating a new investment
     */
    public function create(): Response
    {
        return Inertia::render('Investment/Create', [
            'startups' => Startup::active()->get(['id', 'title']),
            'investmentStages' => InvestmentStage::all(),
        ]);
    }

    /**
     * Store a newly created investment
     */
    public function store(InvestmentStoreRequest $request): JsonResponse
    {
        try {
            $investment = $this->investmentService->createInvestment(
                $request->validated(),
                $request->user()
            );

            return response()->json([
                'success' => true,
                'message' => 'Investment created successfully',
                'investment' => new InvestmentResource($investment),
                'redirect' => route('investments.show', $investment)
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create investment: ' . $e->getMessage()
            ], 422);
        }
    }

    /**
     * Display the specified investment
     */
    public function show(Investment $investment): Response
    {
        $investment->load([
            'startup.industries',
            'investor',
            'investmentStage',
            'investmentDocuments.uploader',
            'investmentUpdates.creator'
        ]);

        // Check if user can view this investment
        $this->authorize('view', $investment);

        $analytics = $this->investmentService->getInvestmentAnalytics($investment);

        return Inertia::render('Investment/Show', [
            'investment' => new InvestmentResource($investment),
            'analytics' => $analytics,
            'canEdit' => $investment->investor_id === auth()->id() || auth()->user()->hasRole('admin'),
            'relatedInvestments' => InvestmentResource::collection(
                Investment::where('startup_id', $investment->startup_id)
                    ->where('id', '!=', $investment->id)
                    ->with(['investor', 'investmentStage'])
                    ->limit(5)
                    ->get()
            ),
        ]);
    }

    /**
     * Show the form for editing the investment
     */
    public function edit(Investment $investment): Response
    {
        $this->authorize('update', $investment);

        return Inertia::render('Investment/Edit', [
            'investment' => new InvestmentResource($investment->load(['startup', 'investmentStage'])),
            'startups' => Startup::active()->get(['id', 'title']),
            'investmentStages' => InvestmentStage::all(),
        ]);
    }

    /**
     * Update the specified investment
     */
    public function update(InvestmentUpdateRequest $request, Investment $investment): JsonResponse
    {
        $this->authorize('update', $investment);

        try {
            $updatedInvestment = $this->investmentService->updateInvestment(
                $investment,
                $request->validated()
            );

            return response()->json([
                'success' => true,
                'message' => 'Investment updated successfully',
                'investment' => new InvestmentResource($updatedInvestment),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update investment: ' . $e->getMessage()
            ], 422);
        }
    }

    /**
     * Remove the specified investment
     */
    public function destroy(Investment $investment): JsonResponse
    {
        $this->authorize('delete', $investment);

        try {
            $this->investmentService->deleteInvestment($investment);

            return response()->json([
                'success' => true,
                'message' => 'Investment deleted successfully',
                'redirect' => route('investments.index')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete investment: ' . $e->getMessage()
            ], 422);
        }
    }

    /**
     * Get investment dashboard data
     */
    public function dashboard(Request $request): JsonResponse
    {
        $user = $request->user();
        $dashboardData = $this->investmentService->getDashboardData($user);

        return response()->json($dashboardData);
    }

    /**
     * Update investment status
     */
    public function updateStatus(Request $request, Investment $investment): JsonResponse
    {
        $this->authorize('update', $investment);

        $request->validate([
            'status' => 'required|in:pending,approved,active,completed,cancelled,exited',
            'notes' => 'nullable|string|max:1000'
        ]);

        try {
            $updatedInvestment = $this->investmentService->updateStatus(
                $investment,
                $request->status,
                $request->notes
            );

            return response()->json([
                'success' => true,
                'message' => 'Investment status updated successfully',
                'investment' => new InvestmentResource($updatedInvestment),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update status: ' . $e->getMessage()
            ], 422);
        }
    }

    /**
     * Record investment exit
     */
    public function recordExit(Request $request, Investment $investment): JsonResponse
    {
        $this->authorize('update', $investment);

        $request->validate([
            'actual_return' => 'required|numeric|min:0',
            'exit_date' => 'required|date',
            'notes' => 'nullable|string|max:1000'
        ]);

        try {
            $updatedInvestment = $this->investmentService->recordExit(
                $investment,
                $request->actual_return,
                $request->exit_date,
                $request->notes
            );

            return response()->json([
                'success' => true,
                'message' => 'Investment exit recorded successfully',
                'investment' => new InvestmentResource($updatedInvestment),
                'roi' => $updatedInvestment->calculateROI(),
                'profit_loss' => $updatedInvestment->calculateProfitLoss(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to record exit: ' . $e->getMessage()
            ], 422);
        }
    }

    /**
     * Get investment portfolio summary
     */
    public function portfolio(Request $request): JsonResponse
    {
        $user = $request->user();
        $portfolio = $this->investmentService->getPortfolioSummary($user);

        return response()->json($portfolio);
    }

    /**
     * Export investments data
     */
    public function export(Request $request): JsonResponse
    {
        $user = $request->user();
        
        try {
            $exportData = $this->investmentService->exportInvestments($user, $request->all());
            
            return response()->json([
                'success' => true,
                'data' => $exportData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to export data: ' . $e->getMessage()
            ], 422);
        }
    }
}