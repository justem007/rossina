<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([

            'name'         => 'ricardo',
            'description'  => 'descrição da nova imagem',
            'alt'          => 'alt da imagem',
            'title'        => 'tudo sobre a imagem aqui',
            'extension'    => '.png',
            'user_id'      => '1'

        ]);
    }
}
