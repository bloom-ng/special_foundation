<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Drop the event_entries table temporarily
        Schema::dropIfExists('event_entries');
        
        // Create a new events table with UUID
        Schema::create('events_new', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('image');
            $table->dateTime('date');
            $table->text('content');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });

        // Copy data from old events table to new one
        $events = DB::table('events')->get();
        foreach ($events as $event) {
            DB::table('events_new')->insert([
                'id' => Str::uuid(),
                'name' => $event->name,
                'image' => $event->image,
                'date' => $event->date,
                'content' => $event->content,
                'status' => $event->status,
                'created_at' => $event->created_at,
                'updated_at' => $event->updated_at
            ]);
        }

        // Drop the old events table
        Schema::dropIfExists('events');

        // Rename the new events table to events
        Schema::rename('events_new', 'events');

        // Recreate event_entries table with UUID foreign key
        Schema::create('event_entries', function (Blueprint $table) {
            $table->id();
            $table->uuid('event_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('company');
            $table->string('phone_number');
            $table->boolean('will_attend');
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Drop both tables
        Schema::dropIfExists('event_entries');
        Schema::dropIfExists('events');

        // Recreate events table with auto-increment ID
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->dateTime('date');
            $table->text('content');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });

        // Recreate event_entries with integer foreign key
        Schema::create('event_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('company');
            $table->string('phone_number');
            $table->boolean('will_attend');
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }
};
