<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('slug');
            $table->string('title');
            $table->text('summary')->nullable();
            $table->text('body')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('featured_image_caption')->nullable();
            $table->tinyInteger('is_featured')->default(0);
            $table->bigInteger('user_id')->index();
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['slug']);
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('slug');
            $table->string('name');
            $table->bigInteger('user_id')->index();
            $table->timestamps();
            $table->softDeletes();
            $table->index('created_at');
            $table->unique(['slug']);
        });

        Schema::create('topics', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('slug');
            $table->string('name');
            $table->bigInteger('user_id')->index();
            $table->timestamps();
            $table->softDeletes();
            $table->index('created_at');
            $table->unique(['slug']);
        });

        Schema::create('posts_tags', function (Blueprint $table) {
            $table->uuid('post_id');
            $table->uuid('tag_id');
            $table->unique(['post_id', 'tag_id']);
        });

        Schema::create('posts_topics', function (Blueprint $table) {
            $table->uuid('post_id');
            $table->uuid('topic_id');
            $table->unique(['post_id', 'topic_id']);
        });

        Schema::create('views', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('post_id')->index();
            $table->string('ip')->nullable();
            $table->text('agent')->nullable();
            $table->string('referer')->nullable();
            $table->timestamps();
            $table->index('created_at');
        });

        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('post_id');
            $table->string('ip')->nullable();
            $table->text('agent')->nullable();
            $table->string('referer')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('topics');
        Schema::dropIfExists('posts_tags');
        Schema::dropIfExists('posts_topics');
        Schema::dropIfExists('views');
        Schema::dropIfExists('visits');
    }
}
