<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Rossina\Post;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'title' => "camiseta"
        ]);

        DB::table('tags')->insert([
            'title' => "preta"
        ]);

        DB::table('tags')->insert([
            'title' => "branca"
        ]);

        DB::table('tags')->insert([
            'title' => "amarela"
        ]);
    }
}
