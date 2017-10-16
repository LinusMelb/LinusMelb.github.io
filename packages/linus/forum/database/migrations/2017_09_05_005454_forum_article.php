<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('forum_articles', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('content');
            $table->string('cover')->default('/storage/covers/default-cover.jpg');
            $table->integer('user_id');
            $table->string('agree')->default(0);
            $table->string('disagree')->default(0);
            $table->string('slug')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('order')->default(1);
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
        //
        Schema::dropIfExists('forum_articles');
    }
}
