<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaBlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_blogs')->insert([
            'title'         => 'Moda Camisetas',
            'description'   => 'Moda Camisetas' ,
            'created_at'    => '2015/11/12 12:40:40',
            'updated_at'    => '2015/11/12 12:40:40',
        ]);

        DB::table('categoria_blogs')->insert([
            'title'         => 'Full Print ',
            'description'   => 'Full Print' ,
            'created_at'    => '2015/11/12 12:40:40',
            'updated_at'    => '2015/11/12 12:40:40',
        ]);

        DB::table('categoria_blogs')->insert([
            'title'         => 'Fashion',
            'description'   => 'Fashion' ,
            'created_at'    => '2015/11/12 12:40:40',
            'updated_at'    => '2015/11/12 12:40:40',
        ]);

        DB::table('categoria_blogs')->insert([
            'title'         => 'Da Hora',
            'description'   => 'Da Hora' ,
            'created_at'    => '2015/11/12 12:40:40',
            'updated_at'    => '2015/11/12 12:40:40',
        ]);

        DB::table('categoria_blogs')->insert([
            'title'         => 'Novidades',
            'description'   => 'Novidades' ,
            'created_at'    => '2015/11/12 12:40:40',
            'updated_at'    => '2015/11/12 12:40:40',
        ]);

        DB::table('categoria_blogs')->insert([
            'title'         => 'Estamparia Digital',
            'description'   => 'Estamparia Digital' ,
            'created_at'    => '2015/11/12 12:40:40',
            'updated_at'    => '2015/11/12 12:40:40',
        ]);

        DB::table('categoria_blogs')->insert([
            'title'         => 'Logistas',
            'description'   => 'Logista' ,
            'created_at'    => '2015/11/12 12:40:40',
            'updated_at'    => '2015/11/12 12:40:40',
        ]);

        DB::table('categoria_blogs')->insert([
            'title'         => 'Marketing',
            'description'   => 'Marketing' ,
            'created_at'    => '2015/11/12 12:40:40',
            'updated_at'    => '2015/11/12 12:40:40',
        ]);

        DB::table('categoria_blogs')->insert([
            'title'         => 'Designer',
            'description'   => 'Designer' ,
            'created_at'    => '2015/11/12 12:40:40',
            'updated_at'    => '2015/11/12 12:40:40',
        ]);

        DB::table('categoria_blogs')->insert([
            'title'         => 'Desenhos',
            'description'   => 'Desenhos' ,
            'created_at'    => '2015/11/12 12:40:40',
            'updated_at'    => '2015/11/12 12:40:40',
        ]);
    }
}
