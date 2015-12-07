<?php

use Illuminate\Database\Seeder;

class CamisetaTamanhoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camisetas_tamanho')->insert([
            'camisetas_id' => 2,
            'tamanho_id' => 1
        ]);

        DB::table('camisetas_tamanho')->insert([
            'camisetas_id' => 2,
            'tamanho_id' => 2
        ]);

        DB::table('camisetas_tamanho')->insert([
            'camisetas_id' => 2,
            'tamanho_id' => 3
        ]);

        DB::table('camisetas_tamanho')->insert([
            'camisetas_id' => 2,
            'tamanho_id' => 4
        ]);

        DB::table('camisetas_tamanho')->insert([
            'camisetas_id' => 2,
            'tamanho_id' => 5
        ]);

        DB::table('camisetas_tamanho')->insert([
            'camisetas_id' => 2,
            'tamanho_id' => 6
        ]);
    }
}
