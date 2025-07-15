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
        Schema::create('summer_schools', function (Blueprint $table) {
            $table->id();
            $table->string('banner'); // image path
            $table->date('start_date');
            $table->date('end_date');
            $table->json('volunteer_locations'); // list of locations
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summer_schools');
    }
};
