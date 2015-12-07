<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CamisetaSilkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camisetas_silk')->insert([
            'camisetas_id' => 2,
            'silk_id' => 6
        ]);

        DB::table('camisetas_silk')->insert([
            'camisetas_id' => 2,
            'silk_id' => 7
        ]);

        DB::table('camisetas_silk')->insert([
            'camisetas_id' => 2,
            'silk_id' => 8
        ]);

        DB::table('camisetas_silk')->insert([
            'camisetas_id' => 2,
            'silk_id' => 9
        ]);

        DB::table('camisetas_silk')->insert([
            'camisetas_id' => 2,
            'silk_id' => 10
        ]);
    }
}
