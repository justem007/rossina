<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlocoUmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloco_ums')->insert([

            'title'       => 'ROSSINA ESTAMPARIA',
            'sub_title'   => 'Veja o que podemos te oferecer na área de estamparia digital. Faça com quem ja conhece do ramo.',
            'alt'         => 'estamparia digital, camisetas. tecidos, estampas, camisetas personalizadas',
            'user_id'     => '1'

        ]);
    }
}
