<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'email' => 'ricardojustem@gmil.com',
            'password' => bcrypt('secret'),

        ]);

        DB::table('users')->insert([

            'name' => 'mike',
            'email' => 'mike@gamil.com',
            'password' => bcrypt('secret2'),

        ]);
    }
}
