<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'name' => 'ricardo',
            'email' => 'ricardojustem@gamil.com',
            'password' => bcrypt('secret'),

        ]);

        DB::table('users')->insert([

            'name' => 'mike',
            'email' => 'mike@gamil.com',
            'password' => bcrypt('secret2'),

        ]);
    }
}
