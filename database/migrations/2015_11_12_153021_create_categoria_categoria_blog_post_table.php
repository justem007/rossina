<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaCategoriaBlogPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_blog_post', function (Blueprint $table) {
            $table->integer('categoria_blog_id')->unsigned();
            $table->foreign('categoria_blog_id')->references('id')->on('categoria_blogs');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->primary(array('categoria_blog_id', 'post_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categoria_blog_post');
    }
}
