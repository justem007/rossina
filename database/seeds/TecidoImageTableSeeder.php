<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TecidoImageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tecido_tecimage')->insert([
            'tecido_id' => 2,
            'tecimage_id' => 1
        ]);

        DB::table('tecido_tecimage')->insert([
            'tecido_id' => 2,
            'tecimage_id' => 3
        ]);
    }
}
