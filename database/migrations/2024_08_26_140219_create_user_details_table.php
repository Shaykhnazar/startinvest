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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('avatar')->nullable()->comment('Url to avatar photo');
            $table->string('cover_photo')->nullable()->comment('Url of cover photo');
            $table->string('resume')->nullable()->comment('Preferred save link to another storage');
            $table->text('bio')->nullable();
            $table->string('skills')->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('organization')->nullable()->comment('Current working place');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
