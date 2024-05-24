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
            $table->enum('gender', ['male', 'female']);
            $table->string('email');
            $table->string('contact_number');
            $table->string('area_of_residence');
            $table->string('religious_affirmation')->nullable();
            $table->enum('availability', ['option1', 'option2', 'option3', 'option4', 'option5']); // replace with actual options
            $table->string('specify_time')->nullable();
            $table->string('times_per_week_month')->nullable();
            $table->text('other')->nullable();
            $table->enum('interests', ['interest1', 'interest2', 'interest3', 'interest4', 'interest5', 'interest6', 'interest7', 'interest8', 'interest9', 'interest10']); // replace with actual interests
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
