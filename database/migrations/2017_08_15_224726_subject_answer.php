<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjectAnswer extends Migration
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
        Schema::create('subject_answers', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('post_id');
            $table->integer('user_id');
            $table->float('difficulty')->default(0);
            $table->float('practicality')->default(0);
            $table->text('answer');
            
            $table->integer('agree')->default(0);
            $table->integer('disagree')->default(0);
            $table->integer('save')->default(0);

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
        Schema::dropIfExists('subject_answers');

    }
}
