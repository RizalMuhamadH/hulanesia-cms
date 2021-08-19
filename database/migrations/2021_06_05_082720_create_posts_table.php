<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->text('body');
            $table->string('source')->nullable();
            $table->string('source_link')->nullable();
            $table->unsignedBigInteger('feature_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->string('status')->default('DRAFT');
            // $table->string('slug');
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('seo_title')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('feature_id')->references('id')->on('features');
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
    }
}
