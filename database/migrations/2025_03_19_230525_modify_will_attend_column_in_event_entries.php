<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, create a temporary column
        Schema::table('event_entries', function (Blueprint $table) {
            $table->string('will_attend_temp')->nullable();
        });

        // Copy the data with conversion
        DB::statement("UPDATE event_entries SET will_attend_temp = CASE WHEN will_attend = 1 THEN 'yes' WHEN will_attend = 0 THEN 'no' END");

        // Drop the old column
        Schema::table('event_entries', function (Blueprint $table) {
            $table->dropColumn('will_attend');
        });

        // Create the new column
        Schema::table('event_entries', function (Blueprint $table) {
            $table->string('will_attend');
        });

        // Copy the data back
        DB::statement("UPDATE event_entries SET will_attend = will_attend_temp");

        // Drop the temporary column
        Schema::table('event_entries', function (Blueprint $table) {
            $table->dropColumn('will_attend_temp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First, create a temporary column
        Schema::table('event_entries', function (Blueprint $table) {
            $table->boolean('will_attend_temp')->nullable();
        });

        // Copy the data with conversion
        DB::statement("UPDATE event_entries SET will_attend_temp = CASE WHEN will_attend = 'yes' THEN 1 WHEN will_attend = 'no' THEN 0 WHEN will_attend = 'maybe' THEN 0 END");

        // Drop the old column
        Schema::table('event_entries', function (Blueprint $table) {
            $table->dropColumn('will_attend');
        });

        // Create the new column
        Schema::table('event_entries', function (Blueprint $table) {
            $table->boolean('will_attend');
        });

        // Copy the data back
        DB::statement("UPDATE event_entries SET will_attend = will_attend_temp");

        // Drop the temporary column
        Schema::table('event_entries', function (Blueprint $table) {
            $table->dropColumn('will_attend_temp');
        });
    }
};
