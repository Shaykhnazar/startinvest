<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('investment_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investment_id')->constrained('investments')->onDelete('cascade');
            $table->string('title');
            $table->longText('content');
            $table->string('update_type')->index(); // progress, financial, milestone, challenge, opportunity, team, product, market
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->boolean('is_milestone')->default(false)->index();
            $table->decimal('financial_impact', 12, 2)->nullable(); // Positive or negative financial impact
            $table->string('visibility')->default('private')->index(); // public, private, investors_only
            $table->json('attachments')->nullable(); // File attachments
            $table->json('metrics')->nullable(); // Key metrics data
            $table->integer('likes_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index(['investment_id', 'update_type']);
            $table->index(['update_type', 'is_milestone']);
            $table->index(['created_by', 'created_at']);
            $table->index(['visibility', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investment_updates');
    }
};