<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTecidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag_tecido')->insert([
            'tag_id' => 5,
            'tecido_id' => 1
        ]);

        DB::table('tag_tecido')->insert([
            'tag_id' => 6,
            'tecido_id' => 1
        ]);

        DB::table('tag_tecido')->insert([
            'tag_id' => 7,
            'tecido_id' => 1
        ]);

        DB::table('tag_tecido')->insert([
            'tag_id' => 8,
            'tecido_id' => 1
        ]);
    }
}
