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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('hero_title')->nullable();
            $table->text('hero_text')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->boolean('show_banner')->default(true);
            $table->boolean('show_countdown')->default(false);
            $table->dateTime('countdown_date')->nullable();
            $table->longText('sections')->nullable();
            $table->json('stats')->nullable();
            $table->text('testimonial')->nullable();
            $table->string('primary_cta_text')->nullable();
            $table->string('primary_cta_link')->nullable();

            $table->string('secondary_cta_text')->nullable();
            $table->string('secondary_cta_link')->nullable();
            $table->boolean('show_in_menu')->default(true);
            $table->string('menu_title')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
