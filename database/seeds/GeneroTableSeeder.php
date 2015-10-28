<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->insert([
            'name'            => 'Masculino',
            'description'     => 'Produtos masculinos',
        ]);

        DB::table('generos')->insert([
            'name'            => 'Feminino',
            'description'     => 'Produtos femininos',
        ]);

        DB::table('generos')->insert([
            'name'            => 'Infantil',
            'description'     => 'Produtos infantis',
        ]);
    }
}
