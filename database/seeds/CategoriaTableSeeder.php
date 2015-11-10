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
            'title'         => 'Moda Camisetas',
            'description'   => 'moda camisetas' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Tecidos ',
            'description'   => 'Tecidos' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Floral',
            'description'   => 'Floral' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Praia',
            'description'   => 'Praia' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Futurista',
            'description'   => 'Futurista' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Ilustração',
            'description'   => 'Ilustração' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Animação',
            'description'   => 'Animação' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Caligrafia',
            'description'   => 'Caligrafia' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Grafite',
            'description'   => 'grafite' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categorias')->insert([
            'title'         => 'Pintura',
            'description'   => 'Pintura' ,
            'user_id'       => 1,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);
    }
}
