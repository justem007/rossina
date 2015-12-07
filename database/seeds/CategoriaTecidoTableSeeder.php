<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaTecidoTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('categoria_tecidos')->insert([
            'title'         => 'Crepe de Chine Plus',
            'description'   => 'cor lisa off white para estampar + outras cores lisas sob consulta por encomenda.' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecidos')->insert([
            'title'         => 'Maui Plus 160 ',
            'description'   => ' cor lisa 8483 branco óptico para estampar + outras cores lisas sob consulta por encomenda.' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecidos')->insert([
            'title'         => 'Techno Light 160',
            'description'   => ' cor lisa branco óptico para estampar + outras cores lisas sob consulta por encomenda.' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecidos')->insert([
            'title'         => 'Hi Multi Chiffon Classic,',
            'description'   => 'cor lisa 50 cruB para estampar + outras cores lisas sob consulta por encomenda.' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecidos')->insert([
            'title'         => 'Pagamento',
            'description'   => 'Pagamento' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecidos')->insert([
            'title'         => 'Sobre a Rossina Estamparia',
            'description'   => 'Rossina Estamparia' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecidos')->insert([
            'title'         => 'Oxford Stretch Tinto',
            'description'   => 'cor lisa 8909 optical white para estampar + outras cores lisas sob consulta por encomenda.' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecidos')->insert([
            'title'         => 'Gloss Light',
            'description'   => 'cor lisa off white para estampar + outras cores lisas sob consulta por encomenda.' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecidos')->insert([
            'title'         => ' Malha Newprene',
            'description'   => 'cor lisa branco para estampar + outras cores lisas sob consulta por encomenda.' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);

        DB::table('categoria_tecidos')->insert([
            'title'         => 'Ergonomic Flex',
            'description'   => 'cor lisa branco para estampar + outras cores lisas sob consulta por encomenda.' ,
            'created_at'    => '2015/11/05 09:40:40',
            'updated_at'    => '2015/11/05 09:40:40',
        ]);
    }
}
