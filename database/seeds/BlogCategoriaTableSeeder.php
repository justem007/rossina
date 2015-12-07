<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_blog_post')->insert([
            'categoria_blog_id'   => 1,
            'post_id'             => 1,
        ]);

        DB::table('categoria_blog_post')->insert([
            'categoria_blog_id'   => 2,
            'post_id'             => 1,
        ]);

        DB::table('categoria_blog_post')->insert([
            'categoria_blog_id'   => 3,
            'post_id'             => 2,
        ]);

        DB::table('categoria_blog_post')->insert([
            'categoria_blog_id'   => 4,
            'post_id'             => 3,
        ]);

        DB::table('categoria_blog_post')->insert([
            'categoria_blog_id'   => 5,
            'post_id'             => 1,
        ]);

        DB::table('categoria_blog_post')->insert([
            'categoria_blog_id'   => 6,
            'post_id'             => 4,
        ]);

        DB::table('categoria_blog_post')->insert([
            'categoria_blog_id'   => 7,
            'post_id'             => 5,
        ]);

        DB::table('categoria_blog_post')->insert([
            'categoria_blog_id'   => 8,
            'post_id'             => 9,
        ]);

        DB::table('categoria_blog_post')->insert([
            'categoria_blog_id'   => 9,
            'post_id'             => 1,
        ]);

        DB::table('categoria_blog_post')->insert([
            'categoria_blog_id'   => 10,
            'post_id'             => 9,
        ]);

    }
}
