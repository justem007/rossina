<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TecidoAmostrasTecidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tecido_tecido_amostra')->insert([
            'tecido_id' => 1,
            'tecido_amostra_id' => 1
        ]);

        DB::table('tecido_tecido_amostra')->insert([
            'tecido_id' => 1,
            'tecido_amostra_id' => 2
        ]);

        DB::table('tecido_tecido_amostra')->insert([
            'tecido_id' => 1,
            'tecido_amostra_id' => 3
        ]);
    }
}
