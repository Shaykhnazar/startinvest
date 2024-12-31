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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Category name
            $table->string('slug')->unique();  // URL-friendly version of name
            $table->text('description')->nullable();  // Optional category description
            $table->integer('parent_id')->nullable();  // For nested categories (optional)
            $table->integer('order')->default(0);  // For custom ordering
            $table->boolean('is_active')->default(true);  // To enable/disable categories
            $table->timestamps();
            $table->softDeletes();  // Adds deleted_at column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
