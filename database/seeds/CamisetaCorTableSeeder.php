<?php

use Illuminate\Database\Seeder;

class CamisetaCorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camisetas_cor')->insert([
            'camisetas_id' => 3,
            'cor_id' => 1
        ]);

        DB::table('camisetas_cor')->insert([
            'camisetas_id' => 3,
            'cor_id' => 3
        ]);
//
//        DB::table('camisetas_cor')->insert([
//            'camisetas_id' => 2,
//            'cor_id' => 1
//        ]);
//
//        DB::table('camisetas_cor')->insert([
//            'camisetas_id' => 2,
//            'cor_id' => 2
//        ]);
    }
}
