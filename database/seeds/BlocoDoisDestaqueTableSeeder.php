<?php

use Illuminate\Database\Seeder;

class BlocoDoisDestaqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloco_dois_destaques')->insert([

            'title'       => 'Estamparia Digital em Metro Corrido',
            'sub_title'   => 'Prestamos serviço imprimindo o seu tecido ou vendemos somente o papel estampado em Impressão Digital com largura máxima de 1,76 m podendo ser estampado em metro corrido (rolos).',
            'user_id'     => '1'
        ]);

        DB::table('bloco_dois_destaques')->insert([

            'title'       => 'Impressão em camisas , máquina Kornit.',
            'sub_title'   => 'Impressão em MÁQUINA DIGITAL KORNIT sem limite de cores no formato de 35 x 45 cm. Já imaginou estampar sua camiseta com alta qualidade de impressão, sem precisar revelar telas, sem pedido mínimo e com alta capacidade de produção?',
            'user_id'     => '1'
        ]);

        DB::table('bloco_dois_destaques')->insert([

            'title'       => 'Desenvolvimento de show room.',
            'sub_title'   => 'Desenvolva conosco o seu show room e comprove nossa qualidade de impressão, podemos produzir em placas de 70x100cm ou a metro corrido com largura máxima de 1,76m.',
            'user_id'     => '1'
        ]);

        DB::table('bloco_dois_destaques')->insert([

            'title'       => 'Transferência Sublimática (novidade)Transferência Sublimática (novidade)',
            'sub_title'   => 'Prestamos serviço de Transferência Sublimática em : Calandra de Cilindro contínua com largura máxima de 1,76 metros nos padrões – rolo a rolo, rolo/peça cortada, rolo/peça pronta. Prensa de Bandeja no formato 70×100 nos padrões – folha/peça cortada ou folha/peça pronta.',
            'user_id'     => '1'
        ]);

        DB::table('bloco_dois_destaques')->insert([

            'title'       => 'Transfer de Recorte (nocidade)',
            'sub_title'   => 'É um filme para PLotters de Recorte preparado para ser transferido por termo-transferência para tecidos tintos e brancos em composições de fibras sintéticas e algodão permitindo personalizar produtos do vestuário como: camisetas,bonés, shorts, agasalhos, moletons, etc.',
            'user_id'     => '1'
        ]);

        DB::table('bloco_dois_destaques')->insert([

            'title'       => 'Tratamento de Tecidos (novidade)',
            'sub_title'   => 'Prestamos serviço de Tratamento de Tecidos com aplicação de “coating” para estamparia digital.',
            'user_id'     => '1'
        ]);

        DB::table('bloco_dois_destaques')->insert([

            'title'       => 'Impressão em Fitas e Cadarços (novidade)',
            'sub_title'   => 'Agora você pode personalizar sua estampa da coleção em cintos, cadarços, gorgurões, passamanaria, cós, fitas, galões, etc. Use a sua criatividade e nos consulte para realizarmos a sua idéia.',
            'user_id'     => '1'
        ]);

        DB::table('bloco_dois_destaques')->insert([

            'title'       => 'Comunicação Visual',
            'sub_title'   => 'Seja inteligente e prático ! Terceirize a sua produção de impressão em tecidos conosco! Estampamos todos os tipos de tecidos em poliéster na largura de até 1,76 mt.',
            'user_id'     => '1'
        ]);

        DB::table('bloco_dois_destaques')->insert([

            'title'       => 'Decoração',
            'sub_title'   => 'Impressão de Alta qualidade para seus trabalhos em até 1,76 mt de largura. Tecidos, Cortinas, Detalhes, Lençol, Edredon, etc. – Artesão – Artista Plástico – Design – Decorador – Arquiteto – Restaurador de MóveisTableSeeder',
            'user_id'     => '1'
        ]);
    }
}
