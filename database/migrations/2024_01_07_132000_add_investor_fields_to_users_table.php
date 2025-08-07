<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Basic profile fields
            $table->string('avatar')->nullable()->after('email');
            $table->text('bio')->nullable()->after('avatar');
            $table->string('location')->nullable()->after('bio');
            $table->string('company')->nullable()->after('location');
            $table->string('position')->nullable()->after('company');
            $table->string('website')->nullable()->after('position');
            $table->string('linkedin_profile')->nullable()->after('website');
            $table->string('twitter_profile')->nullable()->after('linkedin_profile');
            
            // Investor flags
            $table->boolean('is_investor')->default(false)->after('twitter_profile');
            $table->boolean('is_verified')->default(false)->after('is_investor');
            
            // Investment profile
            $table->text('investment_focus')->nullable()->after('is_verified');
            $table->string('investment_stage_focus')->nullable()->after('investment_focus');
            $table->decimal('investment_size_min', 15, 2)->nullable()->after('investment_stage_focus');
            $table->decimal('investment_size_max', 15, 2)->nullable()->after('investment_size_min');
            $table->integer('portfolio_size')->nullable()->after('investment_size_max');
            $table->integer('investment_experience_years')->nullable()->after('portfolio_size');
            $table->json('notable_investments')->nullable()->after('investment_experience_years');
            $table->text('investment_thesis')->nullable()->after('notable_investments');
            
            // Communication preferences
            $table->string('preferred_contact_method')->nullable()->after('investment_thesis');
            $table->boolean('accepts_unsolicited_pitches')->default(false)->after('preferred_contact_method');
            $table->integer('response_time_days')->nullable()->after('accepts_unsolicited_pitches');
            $table->boolean('co_investment_interested')->default(false)->after('response_time_days');
            $table->boolean('mentorship_available')->default(false)->after('co_investment_interested');
            
            // Activity tracking
            $table->timestamp('last_active_at')->nullable()->after('mentorship_available');
            
            // Indexes
            $table->index('is_investor');
            $table->index('is_verified');
            $table->index(['is_investor', 'is_verified']);
            $table->index(['investment_size_min', 'investment_size_max']);
            $table->index('last_active_at');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'avatar',
                'bio',
                'location',
                'company',
                'position',
                'website',
                'linkedin_profile',
                'twitter_profile',
                'is_investor',
                'is_verified',
                'investment_focus',
                'investment_stage_focus',
                'investment_size_min',
                'investment_size_max',
                'portfolio_size',
                'investment_experience_years',
                'notable_investments',
                'investment_thesis',
                'preferred_contact_method',
                'accepts_unsolicited_pitches',
                'response_time_days',
                'co_investment_interested',
                'mentorship_available',
                'last_active_at'
            ]);
        });
    }
};