<?php

namespace App\Http\Controllers;

use App\Services\AnalyticsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AnalyticsController extends Controller
{
    protected AnalyticsService $analyticsService;

    public function __construct(AnalyticsService $analyticsService)
    {
        $this->middleware('auth');
        $this->analyticsService = $analyticsService;
    }

    public function dashboard()
    {
        $this->authorize('viewAnalytics');

        $analytics = [
            'platform_overview' => $this->analyticsService->getPlatformOverview(),
            'investment_trends' => $this->analyticsService->getInvestmentTrends(6),
            'user_activity' => $this->analyticsService->getUserActivityMetrics(30),
            'performance_metrics' => $this->analyticsService->getPerformanceMetrics()
        ];

        if (request()->wantsJson()) {
            return response()->json($analytics);
        }

        return Inertia::render('Analytics/Dashboard', [
            'analytics' => $analytics
        ]);
    }

    public function investments(Request $request)
    {
        $this->authorize('viewAnalytics');

        $months = $request->get('months', 12);
        $analytics = [
            'investment_trends' => $this->analyticsService->getInvestmentTrends($months),
            'industry_analytics' => $this->analyticsService->getIndustryAnalytics(),
            'stage_analytics' => $this->analyticsService->getStageAnalytics()
        ];

        if ($request->wantsJson()) {
            return response()->json($analytics);
        }

        return Inertia::render('Analytics/Investments', [
            'analytics' => $analytics,
            'months' => $months
        ]);
    }

    public function investors(Request $request)
    {
        $this->authorize('viewAnalytics');

        $analytics = $this->analyticsService->getInvestorAnalytics();

        if ($request->wantsJson()) {
            return response()->json($analytics);
        }

        return Inertia::render('Analytics/Investors', [
            'analytics' => $analytics
        ]);
    }

    public function startups(Request $request)
    {
        $this->authorize('viewAnalytics');

        $analytics = $this->analyticsService->getStartupAnalytics();

        if ($request->wantsJson()) {
            return response()->json($analytics);
        }

        return Inertia::render('Analytics/Startups', [
            'analytics' => $analytics
        ]);
    }

    public function custom(Request $request)
    {
        $this->authorize('viewAnalytics');

        $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'industries' => 'nullable|array',
            'stages' => 'nullable|array',
            'min_amount' => 'nullable|numeric|min:0',
            'max_amount' => 'nullable|numeric|gte:min_amount',
            'status' => 'nullable|array'
        ]);

        $filters = $request->only([
            'start_date', 'end_date', 'industries', 'stages', 
            'min_amount', 'max_amount', 'status'
        ]);

        $analytics = $this->analyticsService->getCustomAnalytics($filters);

        if ($request->wantsJson()) {
            return response()->json($analytics);
        }

        return Inertia::render('Analytics/Custom', [
            'analytics' => $analytics,
            'filters' => $filters
        ]);
    }

    public function export(Request $request)
    {
        $this->authorize('viewAnalytics');

        $type = $request->get('type', 'overview');
        $format = $request->get('format', 'json');

        $data = match($type) {
            'overview' => $this->analyticsService->getPlatformOverview(),
            'investments' => $this->analyticsService->getInvestmentTrends(12),
            'investors' => $this->analyticsService->getInvestorAnalytics(),
            'startups' => $this->analyticsService->getStartupAnalytics(),
            'industries' => $this->analyticsService->getIndustryAnalytics(),
            'stages' => $this->analyticsService->getStageAnalytics(),
            default => $this->analyticsService->getPlatformOverview()
        };

        switch ($format) {
            case 'csv':
                return $this->exportToCsv($data, $type);
            case 'xlsx':
                return $this->exportToExcel($data, $type);
            case 'pdf':
                return $this->exportToPdf($data, $type);
            default:
                return response()->json($data);
        }
    }

    // API endpoints for external access
    public function apiOverview()
    {
        $this->authorize('viewAnalytics');
        return response()->json($this->analyticsService->getPlatformOverview());
    }

    public function apiInvestmentTrends(Request $request)
    {
        $this->authorize('viewAnalytics');
        $months = $request->get('months', 6);
        return response()->json($this->analyticsService->getInvestmentTrends($months));
    }

    public function apiIndustryBreakdown()
    {
        $this->authorize('viewAnalytics');
        return response()->json($this->analyticsService->getIndustryAnalytics());
    }

    public function apiPerformanceMetrics()
    {
        $this->authorize('viewAnalytics');
        return response()->json($this->analyticsService->getPerformanceMetrics());
    }

    protected function exportToCsv(array $data, string $type): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $filename = "analytics_{$type}_" . date('Y-m-d_H-i-s') . '.csv';
        
        return response()->streamDownload(function () use ($data) {
            $handle = fopen('php://output', 'w');
            
            // Write headers
            if (!empty($data) && is_array($data)) {
                $firstRow = is_array(reset($data)) ? reset($data) : $data;
                fputcsv($handle, array_keys($firstRow));
                
                // Write data rows
                foreach ($data as $row) {
                    if (is_array($row)) {
                        fputcsv($handle, $row);
                    }
                }
            }
            
            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\""
        ]);
    }

    protected function exportToExcel(array $data, string $type)
    {
        // Would require PhpSpreadsheet or similar library
        // For now, return JSON with Excel mime type
        $filename = "analytics_{$type}_" . date('Y-m-d_H-i-s') . '.xlsx';
        
        return response()->json($data, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment; filename=\"{$filename}\""
        ]);
    }

    protected function exportToPdf(array $data, string $type)
    {
        // Would require TCPDF, MPDF, or similar library
        // For now, return JSON with PDF mime type
        $filename = "analytics_{$type}_" . date('Y-m-d_H-i-s') . '.pdf';
        
        return response()->json($data, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "attachment; filename=\"{$filename}\""
        ]);
    }
}