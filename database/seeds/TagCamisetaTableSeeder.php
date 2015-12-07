<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagCamisetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camisetas_tag')->insert([
            'camisetas_id' => 1,
            'tag_id' => 9
        ]);

        DB::table('camisetas_tag')->insert([
            'camisetas_id' => 1,
            'tag_id' => 10
        ]);

        DB::table('camisetas_tag')->insert([
            'camisetas_id' => 1,
            'tag_id' => 11
        ]);

        DB::table('camisetas_tag')->insert([
            'camisetas_id' => 1,
            'tag_id' => 12
        ]);
    }
}
