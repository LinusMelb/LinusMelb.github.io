<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UniCategory extends Migration
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
        Schema::create('uni_category', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 50);
            $table->string('slug', 12);

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
        Schema::dropIfExists('uni_category');

    }
}
