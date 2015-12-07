<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCamisetasSilkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camisetas_silk', function (Blueprint $table) {
            $table->integer('camisetas_id')->unsigned();
            $table->foreign('camisetas_id')->references('id')->on('camisetas');
            $table->integer('silk_id')->unsigned();
            $table->foreign('silk_id')->references('id')->on('silks');
            $table->primary(array('camisetas_id', 'silk_id'));
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
        Schema::drop('camisetas_silk');
    }
}
