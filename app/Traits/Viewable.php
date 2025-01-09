<?php

namespace App\Traits;

use App\Models\View;
use Illuminate\Support\Facades\Auth;

trait Viewable
{
    public function views()
    {
        return $this->morphMany(View::class, 'viewable');
    }

    public function viewsCount(): int
    {
        return $this->views()->count();
    }

    public function addView(): bool
    {
        $ip = request()->ip();
        $userAgent = request()->userAgent();
        $userId = Auth::id();

        $query = $this->views();

        // Different logic for authenticated and guest users
        if ($userId) {
            // For authenticated users, check only user_id
            $existingView = $query->where('user_id', $userId)->exists();
        } else {
            // For guests, check IP address
            $existingView = $query->where('ip_address', $ip)
                ->whereNull('user_id')
                ->exists();
        }

        if (!$existingView) {
            $this->views()->create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'user_id' => $userId,
            ]);

            return true;
        }

        return false;
    }

    public function uniqueViewsCount(): int
    {
        return $this->views()->distinct('ip_address')->count('ip_address');
    }

    public function viewsCountBetween($startDate, $endDate): int
    {
        return $this->views()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
    }
}
