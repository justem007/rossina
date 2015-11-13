<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'title'         => 'Envio',
            'description'   => 'Produtos/Tamanhos' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Troca ',
            'description'   => 'Troca' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Cancelamento',
            'description'   => 'Cancelamento' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Segurança',
            'description'   => 'segurança' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Pagamento',
            'description'   => 'Pagamento' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Sobre a Rossina Estamparia',
            'description'   => 'Rossina Estamparia' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Logistas',
            'description'   => 'Logista' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Meu Cadastro',
            'description'   => 'Meu Cadastro' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Prazo de entrega',
            'description'   => 'prazo de entrega' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Como enviar estampas',
            'description'   => 'enviar estampas' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);
    }
}
