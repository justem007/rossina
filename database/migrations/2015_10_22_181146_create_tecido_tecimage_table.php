<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTecidoTecimageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecido_tecimage', function (Blueprint $table) {
            $table->integer('tecido_id')->unsigned();
            $table->foreign('tecido_id')->references('id')->on('tecidos');
            $table->integer('tecimage_id')->unsigned();
            $table->foreign('tecimage_id')->references('id')->on('tecimages');
            $table->primary(array('tecido_id', 'tecimage_id'));
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
        Schema::drop('tecido_tecimage');
    }
}
