<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddUrlFerramenta extends Migration
{

    public function up()
    {
        Schema::table('ferramentas', function (Blueprint $table) {
            $table->string('url');
        });
    }

    public function down()
    {
        Schema::table('url', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }
}
