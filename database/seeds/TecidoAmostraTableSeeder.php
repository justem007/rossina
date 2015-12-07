<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TecidoAmostraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tecido_amostras')->insert([
            'name'         => 'bandeira 1',
            'description'  => 'descrição da bandeiras aqui',
            'medidas'      => '10 x 10 cm'
        ]);

        DB::table('tecido_amostras')->insert([
            'name'         => 'bandeira 2',
            'description'  => 'descrição da bandeiras aqui',
            'medidas'      => '15 x 15 cm'
        ]);

        DB::table('tecido_amostras')->insert([
            'name'         => 'bandeira 3',
            'description'  => 'descrição da bandeiras aqui',
            'medidas'      => '70 x 100 cm'
        ]);
    }
}
