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
        Schema::table('beneficiary_applications', function (Blueprint $table) {
            $table->string('lga')->nullable()->after('state_of_origin');
            $table->string('orphanhood_status')->nullable()->after('class_grade');
            $table->string('disability_status')->nullable()->after('orphanhood_status');
            $table->text('disability_details')->nullable()->after('disability_status');
            $table->decimal('school_fees_cost', 12, 2)->nullable()->after('disability_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beneficiary_applications', function (Blueprint $table) {
            $table->dropColumn([
                'lga',
                'orphanhood_status',
                'disability_status',
                'disability_details',
                'school_fees_cost',
            ]);
        });
    }
};
