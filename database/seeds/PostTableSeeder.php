<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Rossina\Post;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        $faker = Faker::create();

        foreach(range(1, 10) as $i)
        {
            Post::create([
                'title'       => $faker->firstName(),
                'text'  => $faker->sentence(),
                'user_id' => 1
            ]);
        }

    }
}
