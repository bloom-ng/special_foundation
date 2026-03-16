<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('event_entries', function (Blueprint $table) {
            $table->string('sponsorship_interest')->nullable()->after('will_attend');
        });
    }

    public function down(): void
    {
        Schema::table('event_entries', function (Blueprint $table) {
            $table->dropColumn('sponsorship_interest');
        });
    }
};
