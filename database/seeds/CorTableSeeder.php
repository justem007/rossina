<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cors')->insert([
            'name' => 'preto',
            'rgb'  => '0,0,0'
        ]);

        DB::table('cors')->insert([
            'name' => 'amarelo',
            'rgb'  => '255,255,0'
        ]);

        DB::table('cors')->insert([
            'name' => 'azul',
            'rgb'  => '0,0,255'
        ]);
    }
}
