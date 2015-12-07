<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamisetasGeneroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camisetas_genero', function (Blueprint $table) {
            $table->integer('camisetas_id')->unsigned();
            $table->foreign('camisetas_id')->references('id')->on('camisetas');
            $table->integer('genero_id')->unsigned();
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->primary(array('camisetas_id', 'genero_id'));
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
        Schema::drop('camisetas_genero');
    }
}
