<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('startup_founder', function (Blueprint $table) {
            $table->id();

            $table->foreignId('startup_id')->constrained('startups')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('founder_id')->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

//            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('startup_founder');
    }
};
