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
        $faker = Faker::create();

        DB::table('comments')->insert([
            'email'       => $faker->email(),
            'text'        => $faker->sentence(),
            'name'        => $faker->word(),
            'active'      => true,
            'post_id'     => 1
        ]);

//        DB::table('comments')->insert();
//
//        $faker = Faker::create();
//
//        foreach(range(6, 10) as $i)
//        {
//            Comment::create([
//                'email'       => $faker->email(),
//                'text'        => $faker->sentence(),
//                'active'      => true,
//                'post_id'     => 1
//            ]);
//        }
    }
}
