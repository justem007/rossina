<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateStatusProducaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_producaos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('aguardando_producao')->default(false);
            $table->boolean('verificando_acabamento')->default(false);
            $table->boolean('aguradando_arquivo')->default(false);
            $table->boolean('em_producao')->default(false);
            $table->boolean('finalizado')->default(false);
            $table->boolean('faturado')->default(false);
            $table->boolean('expedido')->default(false);
            $table->boolean('cancelado')->default(false);
            $table->boolean('devolução')->default(false);
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
        Schema::drop('status_producaos');
    }
}
