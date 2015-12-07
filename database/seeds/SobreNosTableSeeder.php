<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SobreNosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sobre_nos')->insert([
            'titulo'       => 'SEJA BEM-VINDO A NOSSA EMPRESA.',
            'description'  => 'Temos a experiência de 24 anos trabalhando com estamparia. Nosso maior compromisso é com você CLIENTE sempre com pontualidade, sigilo e objetividade na prestação de serviço. A nossa busca é acompanhar e inovar com o mercado de impressão têxtil e criar parcerias de sucesso com nossos fornecedores e clientes. Para estamparia digital direta com tinta base de água com resultados melhores que o “Silk Screen” convencional trabalhamos com a máquina da Kornit, proporcionando agilidade, qualidade e repetibilidade nos impressos. Em 2010 iniciamos as instalações de um parque de impressão digital têxtil com capacidade de produção de 30.000 metros/mês englobando pré-tratamento, impressão e acabamento favorecendo a agilidade em bandeiras, show room, pequenas,médias e grandes tiragens. Como inovação e fator positivo é a impressão com 1,76m de largura, possibilitando imprimir em metro corrido, peças cortadas ou peças prontas. Nossa estrutura é voltada para receber a sua idéia e entregarmos pronta em seu tecido!',
            'created_at'   => '2015/11/18 09:09:09',
            'updated_at'   => '2015/11/18 09:09:09',
        ]);
    }
}
