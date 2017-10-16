<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjectPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        /* This table is to store all questions about subject */
        Schema::create('subject_posts', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('uni_id');
            $table->string('code', 12);
            $table->string('name', 50);
            $table->text('description');
            $table->string('handbook', 150);
            $table->integer('fees');
            $table->string('availability', 4);


            $table->float('difficulty')->default(0);
            $table->float('practicality')->default(0);
            $table->float('score')->default(0);

            $table->integer('views')->unsigned()->default(0);
            $table->integer('answers')->unsigned()->default(0);
            $table->string('status', 10)->default('PUBLISHED');
            $table->integer('created_by_user_id')->unsigned();

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
        Schema::dropIfExists('subject_posts');

    }
}
