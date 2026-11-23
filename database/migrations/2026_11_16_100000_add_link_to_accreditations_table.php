<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Footer accreditation badges were plain images. A link makes each badge
 * clickable, which section 04 asks for on the GlobalGiving badge.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('accreditations', function (Blueprint $table) {
            $table->string('link', 2048)->nullable()->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('accreditations', function (Blueprint $table) {
            $table->dropColumn('link');
        });
    }
};
