<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etiquetas')->insert([
            'name'          => 'etiqueta 1',
            'description'   => 'descrição da etiqueta 1',
            'url_pdf'       => 'http://localhost:8000/api/camisetas/etiquetas/pdf?user=1',
            'user_id'       => 1
        ]);

        DB::table('etiquetas')->insert([
            'name'          => 'etiqueta 2',
            'description'   => 'descrição da etiqueta 2',
            'url_pdf'       => 'http://localhost:8000/api/camisetas/etiquetas/pdf?user=2',
            'user_id'       => 2
        ]);

        DB::table('etiquetas')->insert([
            'name'          => 'etiqueta 3',
            'description'   => 'descrição da etiqueta 3',
            'url_pdf'       => 'http://localhost:8000/api/camisetas/etiquetas/pdf?user=3',
            'user_id'       => 1
        ]);
    }
}
