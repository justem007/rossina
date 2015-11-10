<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlocoCamisetaDestaqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloco_camiseta_destaques')->insert([
            'title'        => 'Camisas brancas e pretas.',
            'sub_title'    => 'Escolha uma das cores base para estampar sua camiseta em máquina kornit com uma qualidade excelente que só a máquina digital pode te oferecer.',
            'user_id'      => 1
        ]);

        DB::table('bloco_camiseta_destaques')->insert([
            'title'        => 'Ideal para e-commerce em todo Brasil.',
            'sub_title'    => 'Se você quer iniciar ou já tem um e-commerce entre contato conosco pois podemos fazer toda sua produção de camisetas.',
            'user_id'      => 1
        ]);

        DB::table('bloco_camiseta_destaques')->insert([
            'title'        => 'Traga seus trabalhos.',
            'sub_title'    => 'Com o nosso maquinário de estamparia digital você pode desenvolver a sua própria linha de estampas para camisetas sem investir alto em desenvolvimento de peças pilotos.',
            'user_id'      => 1
        ]);
    }
}
