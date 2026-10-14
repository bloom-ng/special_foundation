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
        Schema::create('school_build_interests', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('contact_person');
            $table->string('role');
            $table->string('email');
            $table->string('contact_number');
            $table->string('school_address');
            $table->string('state');
            $table->string('lga');
            $table->integer('number_of_students')->nullable();
            $table->json('property_ownership')->nullable();
            $table->text('school_needs')->nullable();
            $table->text('needs_details')->nullable();
            $table->json('photos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_build_interests');
    }
};
