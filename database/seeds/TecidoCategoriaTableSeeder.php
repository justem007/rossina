<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaTecicoTecidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 1,
            'tecido_id'             => 1,
            'created_at'            => '2015/11/05 09:40:40',
            'updated_at'            => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 2,
            'tecido_id'             => 1,
            'created_at'            => '2015/11/05 09:40:40',
            'updated_at'            => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 3,
            'tecido_id'             => 2,
            'created_at'            => '2015/11/05 09:40:40',
            'updated_at'            => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 4,
            'tecido_id'             => 3,
            'created_at'            => '2015/11/05 09:40:40',
            'updated_at'            => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 5,
            'tecido_id'             => 1,
            'created_at'            => '2015/11/05 09:40:40',
            'updated_at'            => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 6,
            'tecido_id'             => 4,
            'created_at'            => '2015/11/05 09:40:40',
            'updated_at'            => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 7,
            'tecido_id'             => 2,
            'created_at'            => '2015/11/05 09:40:40',
            'updated_at'            => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 8,
            'tecido_id'             => 1,
            'created_at'            => '2015/11/05 09:40:40',
            'updated_at'            => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 9,
            'tecido_id'             => 3,
            'created_at'            => '2015/11/05 09:40:40',
            'updated_at'            => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 10,
            'tecido_id'             => 4,
            'created_at'            => '2015/11/05 09:40:40',
            'updated_at'            => '2015/11/05 09:40:40',
        ]);
    }
}
