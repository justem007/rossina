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
//        DB::table('tecidos')->insert([
//            'name'         => 'Cetim de Seda',
//            'description'  => 'As cores dos tecidos podem variar de acordo com a configuração do seu monitor e o tipo de tecido.',
//            'info'         => 'informação de usubilidade do tecido',
//            'user_id'      => 1
//        ]);
//
//        DB::table('tecidos')->insert([
//            'name'         => 'Oxford',
//            'description'  => 'As cores dos tecidos podem variar de acordo com a configuração do seu monitor e o tipo de tecido.',
//            'info'         => 'informação de usubilidade do tecido',
//            'user_id'      => 1
//        ]);

        DB::table('tecidos')->insert([
            'name'         => 'Viscose Lisa',
            'description'  => 'As cores dos tecidos podem variar de acordo com a configuração do seu monitor e o tipo de tecido.',
            'info'         => 'informação de usubilidade do tecido',
            'user_id'      => 1
        ]);
    }
}
