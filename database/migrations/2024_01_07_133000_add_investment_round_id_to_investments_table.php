<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('investments', function (Blueprint $table) {
            $table->foreignId('investment_round_id')->nullable()->after('investment_stage_id')->constrained('investment_rounds')->onDelete('set null');
            $table->timestamp('confirmed_at')->nullable()->after('invested_at');
            
            $table->index('investment_round_id');
            $table->index(['startup_id', 'investment_round_id']);
            $table->index('confirmed_at');
        });
    }

    public function down()
    {
        Schema::table('investments', function (Blueprint $table) {
            $table->dropForeign(['investment_round_id']);
            $table->dropColumn(['investment_round_id', 'confirmed_at']);
        });
    }
};