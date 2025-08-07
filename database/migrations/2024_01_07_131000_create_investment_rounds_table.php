<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('investment_rounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('startup_id')->constrained('startups')->onDelete('cascade');
            $table->string('round_name'); // Seed, Series A, Series B, etc.
            $table->string('round_type')->index(); // seed, series_a, series_b, bridge, etc.
            $table->decimal('target_amount', 15, 2); // Target funding amount
            $table->decimal('raised_amount', 15, 2)->default(0); // Amount raised so far
            $table->decimal('pre_valuation', 15, 2)->nullable(); // Pre-money valuation
            $table->decimal('post_valuation', 15, 2)->nullable(); // Post-money valuation
            $table->integer('investors_count')->default(0); // Number of investors
            $table->string('status')->default('planning')->index(); // planning, active, closed, cancelled
            $table->date('start_date')->nullable()->index();
            $table->date('target_close_date')->nullable();
            $table->date('actual_close_date')->nullable()->index();
            $table->text('description')->nullable();
            $table->json('terms')->nullable(); // Store terms and conditions
            $table->string('lead_investor')->nullable(); // Lead investor name
            $table->decimal('minimum_investment', 10, 2)->nullable();
            $table->boolean('is_public')->default(false); // Whether round is publicly visible

            $table->timestamps();
            $table->softDeletes();

            $table->index(['startup_id', 'status']);
            $table->index(['round_type', 'status']);
            $table->index(['start_date', 'target_close_date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('investment_rounds');
    }
};
