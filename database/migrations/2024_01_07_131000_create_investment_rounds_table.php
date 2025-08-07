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
            $table->foreignId('startup_id')->constrained()->onDelete('cascade');
            $table->foreignId('stage_id')->nullable()->constrained('investment_stages')->onDelete('set null');
            
            // Basic round information
            $table->string('name');
            $table->string('round_type')->nullable(); // seed, series_a, series_b, etc.
            $table->decimal('target_amount', 15, 2);
            $table->decimal('raised_amount', 15, 2)->default(0);
            $table->decimal('min_investment', 15, 2)->nullable();
            $table->decimal('max_investment', 15, 2)->nullable();
            
            // Valuation and shares
            $table->decimal('price_per_share', 15, 4)->nullable();
            $table->decimal('pre_money_valuation', 15, 2)->nullable();
            $table->decimal('post_money_valuation', 15, 2)->nullable();
            $table->bigInteger('total_shares')->nullable();
            $table->bigInteger('shares_offered')->nullable();
            
            // Timeline
            $table->datetime('deadline')->nullable();
            $table->enum('status', ['draft', 'active', 'open', 'closed', 'successful', 'failed', 'cancelled'])->default('draft');
            
            // Details
            $table->text('description')->nullable();
            $table->text('terms_summary')->nullable();
            $table->json('use_of_funds')->nullable();
            $table->json('investor_perks')->nullable();
            $table->json('required_documents')->nullable();
            $table->json('risk_factors')->nullable();
            
            // Legal and compliance
            $table->string('legal_structure')->nullable();
            $table->string('securities_type')->nullable();
            $table->decimal('minimum_commitment', 15, 2)->nullable();
            $table->boolean('is_accredited_only')->default(false);
            $table->json('geographical_restrictions')->nullable();
            
            // Important dates
            $table->datetime('launched_at')->nullable();
            $table->datetime('closed_at')->nullable();
            
            // Platform fees
            $table->decimal('success_fee_percentage', 5, 2)->nullable();
            $table->decimal('platform_fee', 15, 2)->nullable();
            
            // Additional notes
            $table->text('notes')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['startup_id', 'status']);
            $table->index('status');
            $table->index('round_type');
            $table->index(['deadline', 'status']);
            $table->index('launched_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('investment_rounds');
    }
};