<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InvestmentRoundCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => InvestmentRoundResource::collection($this->collection),
            'meta' => [
                'total_rounds' => $this->total(),
                'current_page' => $this->currentPage(),
                'per_page' => $this->perPage(),
                'last_page' => $this->lastPage(),
                'from' => $this->firstItem(),
                'to' => $this->lastItem(),
                'path' => $this->path(),
                'links' => [
                    'first' => $this->url(1),
                    'last' => $this->url($this->lastPage()),
                    'prev' => $this->previousPageUrl(),
                    'next' => $this->nextPageUrl(),
                ],
                'summary' => [
                    'total_target_amount' => $this->collection->sum('target_amount'),
                    'total_raised_amount' => $this->collection->sum('raised_amount'),
                    'active_rounds' => $this->collection->where('status', 'active')->count(),
                    'successful_rounds' => $this->collection->where('status', 'successful')->count(),
                    'average_progress' => $this->collection->avg('progress_percentage'),
                    'rounds_ending_soon' => $this->collection->filter(function ($round) {
                        return $round->deadline && 
                               $round->deadline->isFuture() && 
                               $round->deadline->diffInDays() <= 7;
                    })->count()
                ]
            ]
        ];
    }

    public function with(Request $request): array
    {
        return [
            'filters' => $request->only([
                'search', 'status', 'round_type', 'min_amount', 
                'max_amount', 'stage_id', 'deadline_filter'
            ]),
            'sorting' => $request->only(['sort_by', 'sort_order']),
            'available_filters' => [
                'statuses' => [
                    'draft' => 'Draft',
                    'active' => 'Active',
                    'closed' => 'Closed',
                    'successful' => 'Successful',
                    'failed' => 'Failed',
                    'cancelled' => 'Cancelled'
                ],
                'round_types' => [
                    'pre_seed' => 'Pre-Seed',
                    'seed' => 'Seed',
                    'series_a' => 'Series A',
                    'series_b' => 'Series B',
                    'series_c' => 'Series C',
                    'series_d' => 'Series D',
                    'bridge' => 'Bridge',
                    'convertible' => 'Convertible Note',
                    'equity' => 'Equity'
                ],
                'deadline_filters' => [
                    'ending_soon' => 'Ending Soon (7 days)',
                    'this_month' => 'This Month',
                    'expired' => 'Expired'
                ],
                'sort_options' => [
                    'created_at' => 'Recently Created',
                    'raised_amount' => 'Amount Raised',
                    'target_amount' => 'Target Amount',
                    'progress' => 'Progress %',
                    'deadline' => 'Deadline',
                    'investors_count' => 'Number of Investors'
                ]
            ]
        ];
    }
}