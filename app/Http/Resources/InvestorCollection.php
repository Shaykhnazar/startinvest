<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InvestorCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => InvestorResource::collection($this->collection),
            'meta' => [
                'total_investors' => $this->total(),
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
                ]
            ]
        ];
    }

    public function with(Request $request): array
    {
        return [
            'filters' => $request->only(['search', 'industries', 'min_investment', 'max_investment', 'location']),
            'sorting' => $request->only(['sort_by', 'sort_order'])
        ];
    }
}