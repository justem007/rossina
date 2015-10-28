<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'title'        =>  'Estamparia Digital',
            'description'  =>  'Serviços em estamparia digital',
            'alt'          =>  'fazemos serviços em estamparia digital , metro corrido , camisetas, tecidos em geral'
        ]);

        DB::table('menus')->insert([
            'title'        =>  'Estamparia',
            'description'  =>  'Serviços em estamparia digital',
            'alt'          =>  'fazemos serviços em estamparia digital , metro corrido , camisetas, tecidos em geral'
        ]);

        DB::table('menus')->insert([
            'title'        =>  'Estamparia',
            'description'  =>  'Serviços em estamparia digital',
            'alt'          =>  'fazemos serviços em estamparia digital , metro corrido , camisetas, tecidos em geral'
        ]);

        DB::table('menus')->insert([
            'title'        =>  'Estamparia',
            'description'  =>  'Serviços em estamparia digital',
            'alt'          =>  'fazemos serviços em estamparia digital , metro corrido , camisetas, tecidos em geral'
        ]);

        DB::table('menus')->insert([
            'title'        =>  'Estamparia',
            'description'  =>  'Serviços em estamparia digital',
            'alt'          =>  'fazemos serviços em estamparia digital , metro corrido , camisetas, tecidos em geral'
        ]);

        DB::table('menus')->insert([
            'title'        =>  'Estamparia',
            'description'  =>  'Serviços em estamparia digital',
            'alt'          =>  'fazemos serviços em estamparia digital , metro corrido , camisetas, tecidos em geral'
        ]);
        
    }
}
