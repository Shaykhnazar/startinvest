<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portfolio_tracking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('startup_id')->constrained()->onDelete('cascade');
            $table->foreignId('investment_id')->constrained()->onDelete('cascade');
            
            // Investment Metrics
            $table->decimal('initial_investment', 15, 2);
            $table->decimal('current_valuation', 15, 2)->nullable();
            $table->decimal('paper_return', 15, 2)->default(0);
            $table->decimal('realized_return', 15, 2)->default(0);
            $table->decimal('roi_percentage', 8, 4)->default(0);
            $table->decimal('equity_percentage', 8, 4);
            
            // Performance Tracking
            $table->json('performance_metrics')->nullable();
            $table->json('milestone_tracking')->nullable();
            $table->date('last_valuation_date')->nullable();
            $table->string('investment_stage')->nullable();
            $table->string('current_status')->default('active');
            
            // Risk Assessment
            $table->integer('risk_score')->nullable(); // 1-10 scale
            $table->json('risk_factors')->nullable();
            $table->date('last_risk_assessment')->nullable();
            
            // Timeline Tracking
            $table->date('investment_date');
            $table->date('expected_exit_date')->nullable();
            $table->date('actual_exit_date')->nullable();
            $table->integer('holding_period_months')->nullable();
            
            // Notes and Updates
            $table->text('investor_notes')->nullable();
            $table->json('update_history')->nullable();
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
            
            $table->index(['investor_id', 'startup_id']);
            $table->index(['investment_id']);
            $table->index(['current_status']);
            $table->index(['investment_date']);
            $table->index(['roi_percentage']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_tracking');
    }
};