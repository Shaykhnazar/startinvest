<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('startup_join_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('startup_id')
                ->constrained('startups')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('status', 50)->default('pending')->comment('Tracks the status of the request (pending, accepted, rejected)');
            $table->timestamp('decision_at')->nullable()->comment('Timestamp when the request is either accepted or rejected.');
            $table->timestamps();

            $table->index('status');
            $table->unique(['startup_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('startup_join_requests');
    }
};
