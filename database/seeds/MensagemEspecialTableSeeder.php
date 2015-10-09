<?php

use Illuminate\Database\Seeder;

class MensagemEspecialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mensagem_especiais')->insert([
            'title' => 'Mensagem de promoção',
            'text'  => 'Estamos cadastrnado vendedores para vender camisetas on-line, tenha sua loja própria'
    ]);
    }
}
