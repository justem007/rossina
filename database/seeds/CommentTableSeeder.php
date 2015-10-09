<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Rossina\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();

        $faker = Faker::create();

        foreach(range(1, 10) as $i)
        {
            Comment::create([
                'email'       => $faker->email(),
                'text'        => $faker->sentence(),
                'active'      => true,
                'post_id'     => 1
            ]);
        }
    }
}
