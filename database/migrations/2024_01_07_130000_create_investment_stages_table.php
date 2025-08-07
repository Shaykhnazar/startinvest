<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('investment_stages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('order_index')->default(0);
            
            // Funding amounts
            $table->decimal('min_funding_amount', 15, 2)->nullable();
            $table->decimal('max_funding_amount', 15, 2)->nullable();
            $table->integer('typical_duration_months')->nullable();
            
            // Stage characteristics
            $table->json('key_milestones')->nullable();
            $table->json('investor_types')->nullable();
            $table->decimal('equity_range_min', 8, 4)->nullable();
            $table->decimal('equity_range_max', 8, 4)->nullable();
            
            // Risk and success metrics
            $table->enum('risk_level', ['low', 'medium', 'high', 'very_high'])->default('medium');
            $table->decimal('success_rate', 5, 2)->default(0);
            
            // Status
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
            
            $table->index(['is_active', 'order_index']);
            $table->index('risk_level');
            $table->index('slug');
        });
    }

    public function down()
    {
        Schema::dropIfExists('investment_stages');
    }
};