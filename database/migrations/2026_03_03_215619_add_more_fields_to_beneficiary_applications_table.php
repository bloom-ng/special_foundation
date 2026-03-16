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
             $table->date('date_of_birth')->nullable()->after('programme');
            $table->string('gender')->nullable()->after('date_of_birth');
            $table->string('state_of_origin')->nullable()->after('gender');
            $table->string('father_occupation')->nullable()->after('state_of_origin');
            $table->string('mother_occupation')->nullable()->after('father_occupation');
            $table->string('school_name')->nullable()->after('mother_occupation');
            $table->string('class_grade')->nullable()->after('school_name');
            $table->string('beneficiary_image')->nullable()->after('class_grade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beneficiary_applications', function (Blueprint $table) {
            $table->dropColumn([
                'date_of_birth',
                'gender',
                'state_of_origin',
                'father_occupation',
                'mother_occupation',
                'school_name',
                'class_grade',
                'beneficiary_image'
            ]);
        });
    }
};
