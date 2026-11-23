<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * The homepage awards badges and the footer accreditation badges are the same
 * eight logos. Rather than keeping a second copy of each file, an award can
 * now borrow the logo from its matching accreditation record.
 *
 * `image` becomes nullable so an award can rely on the borrowed logo alone.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('awards', function (Blueprint $table) {
            $table->foreignId('accreditation_id')->nullable()->after('image')
                ->constrained('accreditations')->nullOnDelete();
        });

        // Separate statement: changing a column needs doctrine/dbal on Laravel 10,
        // so this is done with raw SQL to avoid adding a dependency.
        \Illuminate\Support\Facades\DB::statement(
            'ALTER TABLE awards MODIFY image VARCHAR(2048) NULL'
        );
    }

    public function down(): void
    {
        Schema::table('awards', function (Blueprint $table) {
            $table->dropConstrainedForeignId('accreditation_id');
        });

        \Illuminate\Support\Facades\DB::statement(
            'ALTER TABLE awards MODIFY image VARCHAR(2048) NOT NULL'
        );
    }
};
