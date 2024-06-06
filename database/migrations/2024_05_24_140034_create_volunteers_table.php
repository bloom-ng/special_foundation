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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('gender');
            $table->string('email');
            $table->string('contact_number');
            $table->string('area_of_residence');
            $table->string('religious_affirmation')->nullable();
            $table->string('availability');
            $table->string('specify_time')->nullable();
            $table->string('times_per_week_month')->nullable();
            $table->text('other')->nullable();
            $table->string('interests'); 
            $table->string('source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
