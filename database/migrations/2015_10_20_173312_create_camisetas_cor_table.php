<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamisetasCorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camisetas_cor', function (Blueprint $table) {
            $table->integer('camisetas_id')->unsigned();
            $table->foreign('camisetas_id')->references('id')->on('camisetas');
            $table->integer('cor_id')->unsigned();
            $table->foreign('cor_id')->references('id')->on('cors');
            $table->primary(array('camisetas_id', 'cor_id'));
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
        Schema::drop('camisetas_cor');
    }
}
