<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('investments', function (Blueprint $table) {
            // Remove the old date column if it exists and add new fields
            $table->dropColumn(['date']);
            
            // Add comprehensive investment tracking fields
            $table->decimal('equity_percentage', 5, 2)->nullable()->after('amount');
            $table->string('status')->default('pending')->index()->after('equity_percentage');
            $table->timestamp('invested_at')->nullable()->index()->after('status');
            $table->decimal('expected_return', 12, 2)->nullable()->after('invested_at');
            $table->decimal('actual_return', 12, 2)->nullable()->after('expected_return');
            $table->timestamp('exit_date')->nullable()->after('actual_return');
            $table->text('notes')->nullable()->after('exit_date');
            $table->json('documents')->nullable()->after('notes');
            $table->boolean('due_diligence_completed')->default(false)->after('documents');
            $table->boolean('contract_signed')->default(false)->after('due_diligence_completed');
            $table->boolean('payment_confirmed')->default(false)->after('contract_signed');
            
            // Add soft deletes
            $table->softDeletes()->after('payment_confirmed');
            
            // Add indexes for performance
            $table->index(['status', 'invested_at']);
            $table->index(['investor_id', 'status']);
            $table->index(['startup_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::table('investments', function (Blueprint $table) {
            $table->dropColumn([
                'equity_percentage',
                'status', 
                'invested_at',
                'expected_return',
                'actual_return',
                'exit_date',
                'notes',
                'documents',
                'due_diligence_completed',
                'contract_signed',
                'payment_confirmed',
                'deleted_at'
            ]);
            
            // Restore old date column
            $table->date('date')->index()->after('investment_stage_id');
        });
    }
};