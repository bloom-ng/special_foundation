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
        Schema::create('summer_school_waitlists', function (Blueprint $table) {
            $table->id();
            $table->string('centre_name');
            $table->string('contact_person');
            $table->string('role');
            $table->string('email');
            $table->string('contact_number');
            $table->string('location');
            $table->string('state');
            $table->string('lga');
            $table->integer('number_of_children')->nullable();
            $table->string('age_class_range')->nullable();
            $table->json('education_status')->nullable();
            $table->json('participation_type')->nullable();
            $table->text('reason_for_consideration')->nullable();
            $table->text('additional_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summer_school_waitlists');
    }
};
