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

        // Check if the user/ip has already viewed this item today
        $existingView = $this->views()
            ->where(function ($query) use ($ip, $userId) {
                $query->where('ip_address', $ip)
                    ->orWhere('user_id', $userId);
            })
//            ->whereDate('created_at', today())
            ->exists();

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
