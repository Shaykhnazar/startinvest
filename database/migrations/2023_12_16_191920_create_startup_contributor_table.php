<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('startup_contributor', function (Blueprint $table) {
            $table->id();

            $table->foreignId('startup_id')->constrained('startups')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('contributor_id')->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('startup_contributor');
    }
};
