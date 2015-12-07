<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('image_post')->insert([
//            'image_id'   => 1,
//            'post_id'    => 3
//        ]);
//
//        DB::table('image_post')->insert([
//            'image_id'   => 2,
//            'post_id'    => 4
//        ]);
//
//        DB::table('image_post')->insert([
//            'image_id'   => 3,
//            'post_id'    => 5
//        ]);


        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 1,
            'tecido_id'             => 1,
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 2,
            'tecido_id'             => 1,
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 3,
            'tecido_id'             => 2,
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 4,
            'tecido_id'             => 3,
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 5,
            'tecido_id'             => 1,
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 6,
            'tecido_id'             => 4,
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 7,
            'tecido_id'             => 2,
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 8,
            'tecido_id'             => 1,
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 9,
            'tecido_id'             => 3,
        ]);

        DB::table('categoria_tecido_tecido')->insert([
            'categoria_tecido_id'   => 10,
            'tecido_id'             => 4,
        ]);

    }
}
