<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('support_options', function (Blueprint $table) {
            $table->id();
            $table->enum('group', ['individuals', 'businesses'])->default('individuals');
            $table->string('title');
            $table->text('body')->nullable();
            $table->string('image', 2048)->nullable();
            $table->string('button_label');
            $table->string('button_url', 2048);
            $table->string('secondary_label')->nullable();
            $table->string('secondary_url', 2048)->nullable();
            // Stable handle used to tag the button for click tracking.
            $table->string('track_id', 64)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_options');
    }
};
