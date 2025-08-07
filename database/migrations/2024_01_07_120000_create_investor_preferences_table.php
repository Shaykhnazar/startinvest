<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('investor_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investor_id')->constrained('users')->onDelete('cascade');
            
            // Investment Preferences
            $table->json('preferred_industries')->nullable();
            $table->json('preferred_stages')->nullable();
            $table->decimal('min_investment_amount', 15, 2)->nullable();
            $table->decimal('max_investment_amount', 15, 2)->nullable();
            $table->json('preferred_locations')->nullable();
            $table->json('risk_tolerance')->nullable(); // low, medium, high
            
            // Portfolio Preferences
            $table->integer('max_portfolio_companies')->default(50);
            $table->decimal('target_portfolio_diversification', 5, 2)->nullable();
            $table->json('exit_timeline_preferences')->nullable();
            
            // Communication Preferences
            $table->boolean('receive_startup_matches')->default(true);
            $table->boolean('receive_market_updates')->default(true);
            $table->boolean('receive_portfolio_reports')->default(true);
            $table->string('preferred_contact_method')->default('email');
            $table->json('notification_frequency')->nullable();
            
            // Investment Strategy
            $table->text('investment_thesis')->nullable();
            $table->json('deal_evaluation_criteria')->nullable();
            $table->boolean('co_investment_willing')->default(false);
            $table->boolean('lead_investment_willing')->default(false);
            
            $table->timestamps();
            
            $table->index(['investor_id']);
            $table->index(['min_investment_amount', 'max_investment_amount']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('investor_preferences');
    }
};