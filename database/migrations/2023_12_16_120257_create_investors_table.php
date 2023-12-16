<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('investors', function (Blueprint $table) {
            $table->id();

            // main users table references
            $table->foreignId('user_id')->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->json('contacts')->nullable()->comment('Social media contacts');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investors');
    }
};
