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
        Schema::table('socials', function (Blueprint $table) {
            $table->string('provider_token', 1000)->nullable()->change();
            $table->string('provider_refresh_token', 1000)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('socials', function (Blueprint $table) {
            $table->string('provider_token', 255)->nullable()->change();
            $table->string('provider_refresh_token', 255)->nullable()->change();
        });
    }
};
