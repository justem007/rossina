<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddQuantidadeToCamisetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camisetas', function (Blueprint $table) {
            $table->integer('quantidade_tamanho_p')->default(0);
            $table->integer('quantidade_tamanho_m')->default(0);
            $table->integer('quantidade_tamanho_g')->default(0);
            $table->integer('quantidade_tamanho_gg')->default(0);
            $table->integer('quantidade_tamanho_2gg')->default(0);
            $table->integer('quantidade_tamanho_3gg')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camisetas', function (Blueprint $table) {
            $table->dropColumn('quantidade_tamanho_p');
            $table->dropColumn('quantidade_tamanho_m');
            $table->dropColumn('quantidade_tamanho_g');
            $table->dropColumn('quantidade_tamanho_gg');
            $table->dropColumn('quantidade_tamanho_2gg');
            $table->dropColumn('quantidade_tamanho_3gg');
        });
    }
}
