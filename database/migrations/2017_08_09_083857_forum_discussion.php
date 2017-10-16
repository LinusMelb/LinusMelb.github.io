<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumDiscussion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('forum_discussions', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('category_id')->default(1);
            $table->integer('sub_category_id')->default(1);

            $table->string('title', 200);

            $table->text('content');
            $table->integer('user_id')->unsigned();
            $table->boolean('sticky')->default(false);
            $table->integer('views')->unsigned()->default(0);
            $table->integer('answers')->unsigned()->default(0);
            $table->string('status', 10)->default('PUBLISHED');

            $table->timestamps();
            $table->string('slug', 30)->default('Test');
            $table->string('color', 7)->default('#ff6666');

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
        Schema::dropIfExists('forum_discussions');
    }
}
