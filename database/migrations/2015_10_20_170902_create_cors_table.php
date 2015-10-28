<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorsTable extends Migration
{

    public function up()
    {
        Schema::create('cors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('rgb');
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
        Schema::drop('cors');
    }
}
