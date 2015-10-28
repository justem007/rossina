<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_tag')->insert([
            'post_id' => 5,
            'tag_id' => 1
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 5,
            'tag_id' => 6
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 5,
            'tag_id' => 9
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 5,
            'tag_id' => 11
        ]);
    }
}
