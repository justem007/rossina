<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlocoTecidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloco_tecidos')->insert([
            'title'          => 'PRODUTOS TECIDOS R-TEXTIL.',
            'sub_title'      => 'Trabalhamos com a melhor malha em tecidos do mercado, peça agora uma amostra e comprove.',
            'user_id'        => 1
        ]);
    }
}
