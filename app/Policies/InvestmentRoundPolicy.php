<?php

namespace App\Policies;

use App\Models\InvestmentRound;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvestmentRoundPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true; // Anyone can view the list of investment rounds
    }

    public function view(User $user, InvestmentRound $investmentRound): bool
    {
        // Public rounds can be viewed by anyone
        // Private rounds can only be viewed by startup owner, investors, or admins
        return true; // For now, all rounds are public
    }

    public function create(User $user): bool
    {
        return $user->hasVerifiedEmail(); // Must have verified email to create rounds
    }

    public function update(User $user, InvestmentRound $investmentRound): bool
    {
        // Only startup owner or admins can update
        return $user->id === $investmentRound->startup->owner_id || 
               $user->hasRole('admin');
    }

    public function delete(User $user, InvestmentRound $investmentRound): bool
    {
        // Can only delete draft rounds with no investments
        return ($user->id === $investmentRound->startup->owner_id || 
                $user->hasRole('admin')) &&
               $investmentRound->status === 'draft' &&
               $investmentRound->investments()->count() === 0;
    }

    public function launch(User $user, InvestmentRound $investmentRound): bool
    {
        return $user->id === $investmentRound->startup->owner_id || 
               $user->hasRole('admin');
    }

    public function close(User $user, InvestmentRound $investmentRound): bool
    {
        return $user->id === $investmentRound->startup->owner_id || 
               $user->hasRole('admin');
    }

    public function extend(User $user, InvestmentRound $investmentRound): bool
    {
        return $user->id === $investmentRound->startup->owner_id || 
               $user->hasRole('admin');
    }

    public function invest(User $user, InvestmentRound $investmentRound): bool
    {
        return $user->is_investor && 
               $user->hasVerifiedEmail() &&
               $investmentRound->canAcceptInvestments() &&
               !$investmentRound->investments()->where('investor_id', $user->id)->exists();
    }

    public function viewAnalytics(User $user, InvestmentRound $investmentRound): bool
    {
        // Only startup owner, investors in the round, or admins can view detailed analytics
        return $user->id === $investmentRound->startup->owner_id || 
               $user->hasRole('admin') ||
               $investmentRound->investments()->where('investor_id', $user->id)->exists();
    }

    public function viewInvestorList(User $user, InvestmentRound $investmentRound): bool
    {
        // Only startup owner or admins can view full investor list
        return $user->id === $investmentRound->startup->owner_id || 
               $user->hasRole('admin');
    }

    public function viewDocuments(User $user, InvestmentRound $investmentRound): bool
    {
        // Investors and potential investors can view public documents
        return $user->is_investor || 
               $user->id === $investmentRound->startup->owner_id || 
               $user->hasRole('admin');
    }

    public function downloadDocuments(User $user, InvestmentRound $investmentRound): bool
    {
        // Only investors who have invested or startup owner can download
        return $user->id === $investmentRound->startup->owner_id || 
               $user->hasRole('admin') ||
               ($user->is_investor && 
                $investmentRound->investments()
                    ->where('investor_id', $user->id)
                    ->whereIn('status', ['confirmed', 'active'])
                    ->exists());
    }
}