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
        Schema::table('summer_school_volunteer_entries', function (Blueprint $table) {
            $table->text('available_dates')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('summer_school_volunteer_entries', function (Blueprint $table) {
            $table->text('available_dates')->nullable(false)->change();
        });
    }
};
