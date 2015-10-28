<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetaCamisetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camisetas_etiqueta')->insert([
            'camisetas_id'  => 1,
            'etiqueta_id'   => 4
        ]);

        DB::table('camisetas_etiqueta')->insert([
            'camisetas_id'  => 2,
            'etiqueta_id'   => 6
        ]);

        DB::table('camisetas_etiqueta')->insert([
            'camisetas_id'  => 3,
            'etiqueta_id'   => 5
        ]);
    }
}
