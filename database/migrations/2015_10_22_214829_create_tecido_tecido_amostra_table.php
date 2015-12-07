<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTecidoTecidoAmostraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecido_tecido_amostra', function (Blueprint $table) {
            $table->integer('tecido_id')->unsigned();
            $table->foreign('tecido_id')->references('id')->on('tecidos');
            $table->integer('tecido_amostra_id')->unsigned();
            $table->foreign('tecido_amostra_id')->references('id')->on('tecido_amostras');
            $table->primary(array('tecido_id', 'tecido_amostra_id'));
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
        Schema::drop('tecido_tecido_amostra');
    }
}
