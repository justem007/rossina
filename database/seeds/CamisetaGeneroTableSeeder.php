<?php

use Illuminate\Database\Seeder;

class CamisetaGeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camisetas_genero')->insert([
            'camisetas_id' => 3,
            'genero_id' => 1
        ]);

//        DB::table('camisetas_genero')->insert([
//            'camisetas_id' => 1,
//            'genero_id' => 2
//        ]);
//
//        DB::table('camisetas_genero')->insert([
//            'camisetas_id' => 2,
//            'genero_id' => 1
//        ]);
//
//        DB::table('camisetas_genero')->insert([
//            'camisetas_id' => 2,
//            'genero_id' => 2
//        ]);
    }
}
