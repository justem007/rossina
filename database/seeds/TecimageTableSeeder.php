<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TecimageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tecimages')->insert([

            'name'         => 'tecido 1',
            'description'  => 'descrição da nova imagem',
            'alt'          => 'alt da imagem',
            'title'        => 'tudo sobre a imagem aqui',
            'extension'    => '.png',
            'url'          => 'http://localhost:8000/storage/images/image2.png',
            'user_id'      => 1

        ]);

        DB::table('tecimages')->insert([

            'name'         => 'tecido 2',
            'description'  => 'descrição da nova imagem',
            'alt'          => 'alt da imagem',
            'title'        => 'tudo sobre a imagem aqui',
            'extension'    => '.png',
            'url'          => 'http://localhost:8000/storage/images/image2.png',
            'user_id'      => 1

        ]);

        DB::table('tecimages')->insert([

            'name'         => 'tecido 3',
            'description'  => 'descrição da nova imagem',
            'alt'          => 'alt da imagem',
            'title'        => 'tudo sobre a imagem aqui',
            'extension'    => '.png',
            'url'          => 'http://localhost:8000/storage/images/image2.png',
            'user_id'      => 1

        ]);
    }
}
