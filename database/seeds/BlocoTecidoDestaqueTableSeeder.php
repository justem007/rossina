<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlocoTecidoDestaqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloco_tecido_destaques')->insert([
            'title'        => 'Peça uma amostra .',
            'sub_title'    => 'Disponibilizamos uma pequena amostra de tecido 10x10cm na base clara sem estampa e amostra 15x15cm com o tecido estampado para você comprovar nossa qualidade. Frete por conta do cliente.',
            'user_id'      => 1
        ]);

        DB::table('bloco_tecido_destaques')->insert([
            'title'        => 'Tecidos a pronta entrega.',
            'sub_title'    => 'Veja nossa lista de tecidos a pronta entraga (crepe de chine plus, maui plus 160, techno light 160, hi multi chiffon classic, oxford stretch tinto, gloss light, malha newprene, ergonomic flex).',
            'user_id'      => 1
        ]);

        DB::table('bloco_tecido_destaques')->insert([
            'title'        => 'Loja R-Textil',
            'sub_title'    => 'Na nossa loja online você pode encomendar tecidos de confecçõa para os seus outfits favoritos, tecidos de decoração e tecidos para estofados. Para além disso encontrará também os atuais tecidos da moda, para que você esteja seguro de que encomenda o tecido certo, oferecemos-lhe um serviço de amostras.',
            'user_id'      => 1
        ]);
    }
}
