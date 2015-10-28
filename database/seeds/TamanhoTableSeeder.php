<?php

use Illuminate\Database\Seeder;

class TamanhoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tamanhos')->insert([
            'name' => 'p'
        ]);

        DB::table('tamanhos')->insert([
            'name' => 'm'
        ]);

        DB::table('tamanhos')->insert([
            'name' => 'g'
        ]);

        DB::table('tamanhos')->insert([
            'name' => 'gg'
        ]);

        DB::table('tamanhos')->insert([
            'name' => '2gg'
        ]);

        DB::table('tamanhos')->insert([
            'name' => '3gg'
        ]);
    }
}
