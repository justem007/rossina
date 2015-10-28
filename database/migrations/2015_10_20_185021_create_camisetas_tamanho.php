<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCamisetasTamanho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camisetas_tamanho', function (Blueprint $table) {
            $table->integer('camisetas_id')->unsigned();
            $table->foreign('camisetas_id')->references('id')->on('camisetas');
            $table->integer('tamanho_id')->unsigned();
            $table->foreign('tamanho_id')->references('id')->on('tamanhos');
            $table->primary(array('camisetas_id', 'tamanho_id'));
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
        Schema::drop('camisetas_tamanho');
    }
}
