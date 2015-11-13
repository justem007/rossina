<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//        $this->call(UserTableSeeder::class);
//        $this->call(BlocoDoisDestaqueTableSeeder::class);
//        $this->call(BlocoDoisTableSeeder::class);
//        $this->call(BlocoUmDestaqueTableSeeder::class);
//        $this->call(BlocoUmTableSeeder::class);
//        $this->call(FerramentaTableSeeder::class);
//        $this->call(HorarioTableSeeder::class);
//        $this->call(MensagemEspecialTableSeeder::class);
//        $this->call(MenuTableSeeder::class);
//        $this->call(TecidoCategoriaTableSeeder::class);

        Model::reguard();
    }
}
