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
            'name'                     => 'Vermelha',
            'description'              => '100% algodão',
            'quantidade'               => 180,
            'info'                     => ":: Camiseta 100% algodão; :: Malha soft, com algodão penteado, fibra natural e refinada; :: Silk à base d'água.",
            'price'                    => 25.90,
            'price_sem'                => 29.90,
            'active'                   => true,
            'image_id'                 => 3,
            'user_id'                  => 1,
            'quantidade_tamanho_p'     => 10,
            'quantidade_tamanho_m'     => 10,
            'quantidade_tamanho_g'     => 10,
            'quantidade_tamanho_gg'    => 10,
            'quantidade_tamanho_2gg'   => 10,
            'quantidade_tamanho_3gg'   => 10,
        ]);
    }
}
