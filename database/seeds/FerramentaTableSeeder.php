<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FerramentaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ferramentas')->insert([

            'title'        => 'FERRAMENTA RAPPORT',
            'description'  => 'use nossa ferramenta para criar o seu módulo.',
            'alt'          => 'estamparia digital, camisetas, tecidos',
            'image_id'     => '1',
            'user_id'      => '1'
        ]);

        DB::table('ferramentas')->insert([

            'title'        => 'FERRAMENTA CHAT',
            'description'  => 'use nosso chat para tirar suas dúvidas de nossos produtos e serviços.',
            'alt'          => 'estamparia digital, camisetas, tecidos',
            'image_id'     => '1',
            'user_id'      => '1'
        ]);
    }
}
