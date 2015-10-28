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
        DB::table('image_post')->insert([
            'image_id'   => 1,
            'post_id'    => 3
        ]);

        DB::table('image_post')->insert([
            'image_id'   => 2,
            'post_id'    => 4
        ]);

        DB::table('image_post')->insert([
            'image_id'   => 3,
            'post_id'    => 5
        ]);
    }
}
