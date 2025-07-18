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
        Schema::create('summer_school_volunteer_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('summer_school_id')->constrained('summer_schools')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('profession');
            $table->json('preferred_locations');
            $table->text('volunteering_with')->nullable();
            $table->enum('tshirt_size', ['XS', 'S', 'M', 'L', 'XL', 'XXL']);
            $table->text('available_dates');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summer_school_volunteer_entries');
    }
};
