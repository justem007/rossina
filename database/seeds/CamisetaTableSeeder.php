<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CamisetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camisetas')->insert([
            'name'        => 'Camiseta Branca',
            'description' => 'nossas camisetas de qualidade.',
            'quantidade'  => 0,
            'info'        => ":: Camiseta 100% algodão; :: Malha soft, com algodão penteado, fibra natural e refinada; :: Silk à base d'água.",
            'price'       => 29.90,
            'price_sem'   => 29.90,
            'active'      => true,
            'image_id'    => 3,
            'user_id'     => 1,
        ]);
    }
}
