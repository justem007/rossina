<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaFaqTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categoria_faqs')->insert([
            'title'         => 'Envio',
            'description'   => 'Produtos/Tamanhos' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_faqs')->insert([
            'title'         => 'Troca ',
            'description'   => 'Troca' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_faqs')->insert([
            'title'         => 'Cancelamento',
            'description'   => 'Cancelamento' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_faqs')->insert([
            'title'         => 'Segurança',
            'description'   => 'segurança' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_faqs')->insert([
            'title'         => 'Pagamento',
            'description'   => 'Pagamento' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_faqs')->insert([
            'title'         => 'Sobre a Rossina Estamparia',
            'description'   => 'Rossina Estamparia' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_faqs')->insert([
            'title'         => 'Logistas',
            'description'   => 'Logista' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_faqs')->insert([
            'title'         => 'Meu Cadastro',
            'description'   => 'Meu Cadastro' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_faqs')->insert([
            'title'         => 'Prazo de entrega',
            'description'   => 'prazo de entrega' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_faqs')->insert([
            'title'         => 'Como enviar estampas',
            'description'   => 'enviar estampas' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);
    }
}
