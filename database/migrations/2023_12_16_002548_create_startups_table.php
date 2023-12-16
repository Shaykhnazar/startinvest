<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('startups', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Project Title
            $table->text('description'); // Project Description
            $table->text('additional_information')->nullable(); // Additional Information
            $table->date('start_date'); // Start Date
            $table->date('end_date')->nullable(); // End Date
            $table->integer('success_rate')->nullable(); // Success Rate
            $table->decimal('base_price', 10)->nullable(); // Base Price column
            $table->boolean('has_mvp')->default(false); // MVP indicator
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('startups');
    }
};
