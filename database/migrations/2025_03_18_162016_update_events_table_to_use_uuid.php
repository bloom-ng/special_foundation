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
        // Add UUID column
        Schema::table('events', function (Blueprint $table) {
            $table->uuid('uuid')->after('id')->unique();
        });

        // Generate UUIDs for existing records
        DB::table('events')->get()->each(function ($event) {
            DB::table('events')
                ->where('id', $event->id)
                ->update(['uuid' => Str::uuid()]);
        });

        // Update event_entries foreign key
        Schema::table('event_entries', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
        });

        // Drop old ID column and make UUID primary
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->renameColumn('uuid', 'id');
            $table->primary('id');
        });

        // Update event_entries to use UUID
        Schema::table('event_entries', function (Blueprint $table) {
            $table->uuid('event_id')->change();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    public function down()
    {
        // This is a destructive change, so we'll just provide a basic rollback
        Schema::table('event_entries', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropPrimary();
            $table->renameColumn('id', 'uuid');
            $table->id();
        });

        Schema::table('event_entries', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->change();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
};
