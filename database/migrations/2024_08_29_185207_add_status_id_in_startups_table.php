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
        Schema::table('startups', function (Blueprint $table) {
            // Add the new status_id column
            $table->unsignedBigInteger('status_id')->nullable()->after('status')->index();

            // Set up the foreign key constraint
            $table->foreign('status_id')->references('id')->on('startup_statuses')->onUpdate('cascade')->onDelete('set null');

            // Remove the old status column
            $table->dropColumn('status');

            $table->index('title');
            $table->index('start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('startups', function (Blueprint $table) {
            // Add the status column back as a string
            $table->string('status', 255)->after('status_id')->nullable()->index();

            // Drop the foreign key and the status_id column
            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');

            $table->dropIndex(['title']);
            $table->dropIndex(['start_date']);
        });
    }
};
