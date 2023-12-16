<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('startup_industry', function (Blueprint $table) {
            $table->id();

            $table->foreignId('startup_id')->constrained('startups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('industry_id')->constrained('industries')
                ->onUpdate('cascade')
                ->onDelete('cascade');

//            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('startup_industry');
    }
};
