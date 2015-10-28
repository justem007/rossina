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

            'name'         => 'novas imagens',
            'description'  => 'descrição da nova imagem',
            'alt'          => 'alt da imagem',
            'title'        => 'tudo sobre a imagem aqui',
            'extension'    => '.png',
            'url'          => 'http://localhost:8000/storage/images/image2.png',
            'user_id'      => '1'

        ]);

        DB::table('images')->insert([

            'name'         => 'Novas imagens 4',
            'description'  => 'descrição da nova imagem',
            'alt'          => 'alt da imagem',
            'title'        => 'tudo sobre a imagem aqui',
            'extension'    => '.png',
            'url'          => 'http://localhost:8000/storage/images/image.png',
            'user_id'      => '1'

        ]);
    }
}
