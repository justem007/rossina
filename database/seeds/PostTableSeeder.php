<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{

     public function run()
    {

        DB::table('posts')->insert([
                'title'       => 'Um novo título aqui 3',
                'text'        => 'faça sua descrição do post aqui 3',
                'user_id'     => 1
            ]);
        }
}
