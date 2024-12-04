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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_id')->comment('Telegram chat ID'); // Telegram chat ID
            $table->string('profile_username')->comment('Instagram username'); // Instagram username
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->unsignedBigInteger('last_known_followers')->nullable()->comment('Last known number of followers');
            $table->unsignedBigInteger('last_known_following')->nullable()->comment('Last known number of following');
            $table->unsignedBigInteger('last_known_posts')->nullable()->comment('Last known number of posts');
            $table->timestamps();

            $table->unique(['chat_id', 'profile_username']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
