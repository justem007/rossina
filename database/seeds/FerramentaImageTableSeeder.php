<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FerramentaImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ferramenta_image')->insert([
            'ferramenta_id'   => 1,
            'image_id'        => 2,
        ]);

        DB::table('ferramenta_image')->insert([
            'ferramenta_id'   => 2,
            'image_id'        => 1,
        ]);
    }
}
