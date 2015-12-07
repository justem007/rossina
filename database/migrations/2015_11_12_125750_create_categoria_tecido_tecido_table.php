<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTecidoTecidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_tecido_tecido', function (Blueprint $table) {
            $table->integer('categoria_tecido_id')->unsigned();
            $table->foreign('categoria_tecido_id')->references('id')->on('categoria_tecidos');
            $table->integer('tecido_id')->unsigned();
            $table->foreign('tecido_id')->references('id')->on('tecidos');
            $table->primary(array('categoria_tecido_id', 'tecido_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categoria_tecido_tecido');
    }
}
