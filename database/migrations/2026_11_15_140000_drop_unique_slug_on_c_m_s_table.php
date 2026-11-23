<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * The c_m_s.slug column doubles as the job title for team members, so the
 * unique index prevented two people from sharing a position (the foundation
 * has two Foundation Managers). Nothing looks a CMS row up by slug, so the
 * index is demoted to a plain, non-unique one.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('c_m_s', function (Blueprint $table) {
            $table->dropUnique('c_m_s_slug_unique');
            $table->index('slug', 'c_m_s_slug_index');
        });
    }

    public function down(): void
    {
        Schema::table('c_m_s', function (Blueprint $table) {
            $table->dropIndex('c_m_s_slug_index');
            $table->unique('slug', 'c_m_s_slug_unique');
        });
    }
};
