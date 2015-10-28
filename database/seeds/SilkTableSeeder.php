<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SilkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('silks')->insert([
            'name'          => 'A4 - base clara',
            'description'   => 'Silk A4',
            'medida'        => '210 × 297 mm',
            'price_un_com'  => 9.95,
            'price_un_sem'  => 12.95
        ]);

        DB::table('silks')->insert([
            'name'          => 'A3 - base clara',
            'description'   => 'Silk A3',
            'medida'        => '297 × 420 mm',
            'price_un_com'  => 11.90,
            'price_un_sem'  => 15.90
        ]);

        DB::table('silks')->insert([
            'name'          => 'ME-1 - base clara',
            'description'   => 'Medida Especial 1',
            'medida'        => '350 x 450 mm',
            'price_un_com'  => 14.30,
            'price_un_sem'  => 18.35
        ]);

        DB::table('silks')->insert([
            'name'          => 'ME-2 - base clara',
            'description'   => 'Medida Especial 2',
            'medida'        => '210 × 297 mm',
            'price_un_com'  => 6.90,
            'price_un_sem'  => 8.90
        ]);

        DB::table('silks')->insert([
            'name'          => 'Etiqueta - base clara',
            'description'   => 'silk etiqueta c/cnpj,padrão inmetro (parte interna das costas)',
            'medida'        => '2,5 x 4,8 cm',
            'price_un_com'  => 1.35,
            'price_un_sem'  => 1.80
        ]);
        DB::table('silks')->insert([
            'name'          => 'A4 - base escuro',
            'description'   => 'Silk A4',
            'medida'        => '210 × 297 mm',
            'price_un_com'  => 14.30,
            'price_un_sem'  => 17.30
        ]);

        DB::table('silks')->insert([
            'name'          => 'A3 - base escuro',
            'description'   => 'Silk A3',
            'medida'        => '297 × 420 mm',
            'price_un_com'  => 17.60,
            'price_un_sem'  => 20.60
        ]);

        DB::table('silks')->insert([
            'name'          => 'ME-1 - base escuro',
            'description'   => 'Medida Especial 1',
            'medida'        => '350 x 450 mm',
            'price_un_com'  => 19.90,
            'price_un_sem'  => 24.90
        ]);

        DB::table('silks')->insert([
            'name'          => 'ME-2 - base escuro',
            'description'   => 'Medida Especial 2',
            'medida'        => '210 × 297 mm',
            'price_un_com'  => 9.90,
            'price_un_sem'  => 12.90
        ]);

        DB::table('silks')->insert([
            'name'          => 'Etiqueta - base escuro',
            'description'   => 'silk etiqueta c/cnpj,padrão inmetro (parte interna das costas)',
            'medida'        => '2,5 x 4,8 cm',
            'price_un_com'  => 1.35,
            'price_un_sem'  => 1.80
        ]);
    }
}
