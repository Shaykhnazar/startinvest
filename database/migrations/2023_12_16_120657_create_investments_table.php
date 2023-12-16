<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investor_id')->constrained('investors'); // Foreign key to investors table
            $table->foreignId('startup_id')->constrained('startups'); // Foreign key to projects table
            $table->foreignId('investment_stage_id')->constrained('investment_stages'); // Foreign key to investment_stages table
            $table->date('date')->index();
            $table->decimal('amount', 10, 2)->index()->nullable(); // Investment amount
            $table->string('currency')->index()->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
