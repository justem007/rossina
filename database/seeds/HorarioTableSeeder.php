<?php

use Illuminate\Database\Seeder;

class HorarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horarios')->insert([
            'atendimento' => 'Atendemos de segunda a sexta de 8:00 as 17:00 hrs',
            'telefone'    => '+55 (21)3245-9607 / (21) 2602-7536 ',
            'entrega'     => 'Entregamos em todo Brasil.'
        ]);
    }
}
