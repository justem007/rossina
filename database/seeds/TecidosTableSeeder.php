<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TecidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tecidos')->insert([
            'name'         => 'Tecido Bom',
            'description'  => 'As cores dos tecidos podem variar de acordo com a configuração do seu monitor e o tipo de tecido.',
            'info'         => 'informação de usubilidade do tecido',
            'user_id'      => 1
        ]);
    }
}
