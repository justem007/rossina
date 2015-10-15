<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlocoDoisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloco_dois')->insert([
            'title'       => 'SERVIÇOS EM ESTAMPARIA DIGITAL R-SERVICES.',
            'sub_title'   => 'Conheça nossos serviços da área de estamparia digital e utilize o que há de mais moderno.',
            'alt'         => 'estamparia digital, camisetas. tecidos, estampas, camisetas personalizadas',
            'user_id'     => '1'
        ]);
    }
}
