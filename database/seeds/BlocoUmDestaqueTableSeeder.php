<?php

use Illuminate\Database\Seeder;

class BlocoUmDestaqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloco_um_destaques')->insert([

            'title'       => 'R-SHIRT',
            'sub_title'   => 'Venda de camisetas no atacado, pedido mínimo de 10 peças.
                              Use nossa ferramenta CRIE para encomendar a suas camisetas ou para pedir um orçamento.
                               Disponibilizamos camisetas nas cores preta e branca, com a livre escolha de sua imagem ou use nosso acervo de imagens .',
            'alt'         => 'estamparia digital, camisetas. tecidos, estampas, camisetas personalizadas',
            'image_id'    =>'1',
            'user_id'     => '1'

        ]);

        DB::table('bloco_um_destaques')->insert([

            'title'       => 'R-TEXTIL',
            'sub_title'   => 'Na nossa loja online você pode encomendar mais de 6 tipos de tecidos a metro de
                              alta qualidade: Tecidos de confecção para os seus outfits favoritos, tecidos de decoração e tecidos
                              para estofos para uma bela casa . Para além disso encontrará também os atuais tecidos da moda para
                              utilizações especiais. Para que você esteja seguro de que encomenda o tecido certo, oferecemos-lhe
                              um serviço de amostras.',
            'image_id'    =>'1',
            'user_id'     => '1'

        ]);

        DB::table('bloco_um_destaques')->insert([

            'title'       => 'R-SERVICES',
            'sub_title'   => 'Prestamos serviços de estamparia digital imprimindo o seu tecido ou vendemos
                              somente o papel estamapado em impressão digital com largura máxima de 1,76m
                              podendo ser estampado em metro corrido (rolo), peças cortadas ou peças prontas
                               (confeccionadas) somente em tecidos com fibras de poliester ou mistura com outras
                                fibras.
                              Prestamos serviços para impressão em camisas em máquina digital kornit, sem
                              limite de cores no formato máximo de 35 x 45cm, em camisas base claras ou escuras.',
            'alt'         => 'estamparia digital, camisetas. tecidos, estampas, camisetas personalizadas',
            'image_id'    =>'1',
            'user_id'     => '1'

        ]);
    }
}
