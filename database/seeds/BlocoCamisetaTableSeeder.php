<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlocoCamisetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloco_camisetas')->insert([
            'title'          => 'PRODUTOS CAMISETAS R-SHIRT.',
            'sub_title'      => 'Ofereça para o seu cliente um ótimo produto e surpreenda com a melhor qualidade.',
            'user_id'        => 1
        ]);
    }
}
