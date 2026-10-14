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
        Schema::create('mentorship_interests', function (Blueprint $table) {
            $table->id();
            $table->string('organisation_name');
            $table->string('contact_person');
            $table->string('role');
            $table->string('email');
            $table->string('contact_number');
            $table->string('location');
            $table->string('lga');
            $table->integer('number_of_students')->nullable();
            $table->string('age_class_range')->nullable();
            $table->json('support_areas')->nullable();
            $table->string('support_area_other')->nullable();
            $table->text('session_goals')->nullable();
            $table->text('additional_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentorship_interests');
    }
};
