<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('author_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
//            $table->foreignId('category_id')
//                ->constrained()
//                ->cascadeOnDelete()
//                ->cascadeOnUpdate();
//            $table->foreignId('status_id')
//                ->nullable()
//                ->constrained()
//                ->cascadeOnDelete()
//                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
