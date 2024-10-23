<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('startup_publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('startup_id')
                ->constrained('startups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('instagram')->nullable()->default(null);
            $table->boolean('linkedin')->nullable()->default(null);
            $table->boolean('reddit')->nullable()->default(null);
            $table->boolean('telegram')->nullable()->default(null);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('startup_publications');
    }
};
