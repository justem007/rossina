<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_cliente');
            $table->string('url_foto')->nullable();
            $table->string('nome_empresa');
            $table->string('nome_fantasia');
            $table->string('cnpj');
            $table->string('inscricao_estadual')->nullable();
            $table->string('telefone', 15)->nullable();
            $table->string('celular', 15)->nullable();
            $table->string('celular_dois', 15)->nullable();
            $table->string('fax', 15)->nullable();
            $table->string('email', 50);
            $table->string('site', 100)->nullable();
            $table->string('cep', 15);
            $table->string('cidade');
            $table->char('uf', 2);
            $table->string('endereco');
            $table->decimal('numero');
            $table->string('complemento')->nullable();
            $table->string('obs');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::drop('clientes');
    }
}