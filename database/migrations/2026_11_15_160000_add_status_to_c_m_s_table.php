<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Lets team and advisory board members be shown or hidden from the admin
 * without deleting them. Existing rows default to active so nothing
 * disappears when this runs.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('c_m_s', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active')->after('type');
        });
    }

    public function down(): void
    {
        Schema::table('c_m_s', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
