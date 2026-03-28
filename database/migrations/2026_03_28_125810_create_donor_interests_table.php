<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('donor_interests', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('country')->nullable();
            $table->string('occupation')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('bio')->nullable();

            $table->integer('children_count')->nullable();
            $table->string('preferred_age')->nullable();
            $table->string('preferred_location')->nullable();

            $table->integer('students_count')->nullable();
            $table->string('preferred_field')->nullable();
            $table->string('institution_type')->nullable();

            $table->string('duration')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('agree')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donor_interests');
    }
};
