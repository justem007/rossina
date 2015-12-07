<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            'title'        => 'Como funciona o pedido de reprint? O que é?',
            'description'  => 'Utilizando o botão “Pedir Reprint”, o cliente cadastra seu email e é avisado em primeira mão quando o produto desejado retornar ao estoque no tamanho escolhido. O número de pedidos de reprint interfere diretamente na prioridade de produção da peça. Mas atenção: o pedido de reprint não garante a reserva nem a produção da mesma.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Como funciona o processo de troca?',
            'description'  => 'Nossa política do consumidor assegura a troca dos produtos em um prazo de 30 dias após o recebimento. Para solicitar a troca, basta enviar um email para contato@chicorei.com.br informando o número do pedido e o produto que deseja trocar. Feito isso, nossa equipe de atendimento dará sequência ao processo, prezando sempre pelo conforto do cliente.
                               Todos os produtos trocados passam por uma análise no momento em que chegam ao Centro de Distribuição da Chico Rei. O produto desejado para troca só será liberado após aprovação por parte desse controle.
                               A primeira troca na Chico Rei é gratuita. Para as próximas temos alguns procedimentos bem fáceis que podem ser esclarecidos por email.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Qual tamanho de produto escolher?',
            'description'  => 'Em cada modelo de camiseta existe um botão "Confira as Medidas". Clicando nele, aparecerá um diagrama com todos os tamanhos e suas respectivas medidas. Você pode comparar as medidas de nossas camisetas com as de alguma outra que você já tenha.
                               Não esqueça, as medidas podem ser diferentes em cada modelagem ou estampa, podendo variar até 3% em relação às informadas no site.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Qual tamanho escolher?',
            'description'  => 'Em cada modelo de camiseta existe um botão "Confira as Medidas". Clicando nele, aparecerá um diagrama com todos os tamanhos e suas respectivas medidas. Você pode comparar as medidas de nossas camisetas com as de alguma outra que você já tenha.
                               Não esqueça, as camisetas podem ser diferentes devido ao tipo de sua modelagem e as medidas podem variar em até 4% em relação às informadas.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Especificações e qualidade: Camisetas',
            'description'  => 'Nossas camisetas são produzidas com malhas especiais e de alta qualidade. Nosso processo de produção conta com acabamento individual, em que cada peça recebe tratamento único, com alto controle de qualidade. Utilizamos tecnologia exclusiva e inovadora em nossas malhas: o tecido passa por uma lavagem com jato de cerâmica, procedimento que não agride o produto, ao contrário dos convencionais, nos quais o mesmo é lixado. Esse processo de lavagem proporciona ao produto um toque agradável, com uma superfície regular. Além disso, o efeito visual apresenta um desgaste proposital e sutil.
                               O processo de estamparia é feito de forma artesanal e cada peça recebe cuidado único, sempre prezando pela total satisfação de nossos clientes. Não fazemos uso de máquinas: utilizamos silk screen à base d’água, o que requer atenção especial em cada peça. Cada cor é estampada individualmente, além de serem previamente testadas até que cheguemos ao ponto desejado no momento da criação da arte.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Como devo lavar minhas camisetas Chico Rei?',
            'description'  => 'A Chico Rei trabalha com as melhores malhas do Brasil, mas, mesmo assim, recomendamos alguns cuidados para que a sua peça dure por bastante tempo.
                               Orientamos que lave sua peça à mão. Primeiro, você deve dissolver o sabão a ser utilizado na água, antes de adicionar a roupa. Esta operação visa minimizar danos causados à peça. Também recomendamos respeitar as orientações dos próprios fabricantes de sabão. Não use alvejantes e lave as peças coloridas separadamente. Não deixe a peça de molho e procure secá-la à sombra. Após a lavagem, nada de torcer sua camiseta. Nossas peças não soltam tinta, por isso não nos responsabilizamos por produtos danificados com machas, certo?
                               Tome muito cuidado ao passar sua camiseta! Técnicas diferenciadas de estampas exigem temperaturas distintas indicadas para o uso do ferro de passar roupa, ou seja, são de responsabilidade do cliente, que deve seguir as instruções indicadas nas etiquetas de composição.
                               No mais, é só seguir as instruções de conservação contidas nas TAGs enviadas com suas camisetas.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Especificações e qualidade: Posters',
            'description'  => 'Os posters da Chico Rei são impressos em gráfica e produzidos em papel couché fosco, com gramatura de 230g, medindo 58,4 cm por 42 cm.
                               O envio é feito com todo o cuidado para que cheguem impecáveis: os posters são enrolados, envolvidos por um papel especial e embalados em um tubo resistente.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Onde os produtos são feitos?',
            'description'  => ' Nossa produção é toda verticalizada, fazendo com que cada etapa desse seja acompanhada de perto e com rigoroso controle de qualidade.
                                A produção de nossas camisetas se concentra em Juiz de Fora, Minas Gerais, sendo dividida em três polos: primeiro passa pelo processo de criação, realizado em nosso galpão criativo. Feito isso, o tecido ganha forma em nossa confecção e é estampado em nossa estamparia, ambos trabalhando 100% em função da Chico Rei.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Posso comprar um produto esgotado?',
            'description'  => 'Não, mas você pode utilizar o botão “Pedir Reprint” para ser avisado, em primeira mão, quando o produto desejado retornar ao estoque.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Como funciona o pedido de reprint?',
            'description'  => 'Utilizando o botão “Pedir Reprint”, o cliente cadastra seu email e é avisado em primeira mão quando o produto desejado retornar ao estoque no tamanho escolhido. O número de pedidos de reprint interfere diretamente na prioridade de produção da peça. Mas atenção: o pedido de reprint não garante a reserva nem a produção da mesma.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Vocês desenvolvem camisetas por encomenda?',
            'description'  => ' Não. A Chico Rei produz apenas as demandas desenvolvidas por nossa equipe de criação. Mas nada impede que você nos envie suas sugestões: adoramos quando isso acontece!',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Posso escolher a cor da camiseta?',
            'description'  => 'Não. A Chico Rei trabalha apenas com uma cor de malha para cada estampa. Assim criamos um produto exclusivo e pensado especialmente para cada cor de malha.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Posso comprar uma camiseta esgotada?',
            'description'  => 'Não, mas você pode utilizar o botão “Pedir Reprint” para ser avisado, em primeira mão, quando o produto desejado retornar ao estoque.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Como funciona o reprint?',
            'description'  => ' Utilizando o botão “Pedir Reprint”, o cliente cadastra seu email e é avisado em primeira mão quando o produto desejado retornar ao estoque no tamanho escolhido. O número de pedidos de reprint interfere diretamente na prioridade de produção da peça. Mas atenção: o pedido de reprint não garante a reserva nem a produção da mesma.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Se eu coloco um produto no carrinho significa que ele já está reservado?',
            'description'  => 'Não. Colocar um produto no carrinho de compras não garante a reserva do mesmo, logo, outro usuário pode comprá-lo antes. O produto só é reservado após o fechamento do pedido.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Qual prazo para realizar uma troca?',
            'description'  => 'Nossa política do consumidor assegura o direito de troca do produto em um prazo de até 30 dias após o recebimento do mesmo.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Como solicitar uma troca?',
            'description'  => ' Para solicitar a troca de algum produto, basta enviar um email para contato@chicorei.com.br, informando o número do pedido e o produto que deseja trocar. Feito isso, nossa equipe de atendimento dará sequência ao processo, prezando sempre pelo conforto do cliente.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Qual é o prazo para escolha da camiseta que desejo receber em troca?',
            'description'  => 'O prazo para a escolha das camisetas pretendidas é de 30 dias após a solicitação da troca. Caso a mesma não seja informada no prazo estipulado, a solicitação de troca será cancelada.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Quais as condições para a troca?',
            'description'  => 'O produto deve ser devolvido sem uso ou lavagem, em embalagem fechada, acompanhado do DANFE (Documento Auxiliar da Nota Fiscal Eletrônica).
                               Todos os produtos devolvidos passam por uma análise no momento em que chegam ao Centro de Distribuição da Chico Rei. O produto desejado para troca só será liberado após aprovação por parte desse controle.
                               Caso seja identificada qualquer divergência ou violação do produto, não aceitaremos a devolução e o produto retornará ao remetente. Também não são aceitas trocas de produtos após a lavagem dos mesmos.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Quais são os custos para realizar a troca?',
            'description'  => 'Em caso de primeira troca no site, todas as despesas referentes ao envio e reenvio do produto são arcadas pela Chico Rei. O cliente receberá um código que lhe dará o direito de postar o produto em qualquer agência credenciada dos Correios, sem custo algum, desde que o mesmo esteja em uma caixa fechada.
                               Caso não seja a primeira troca, os custos de envio são do próprio cliente. Uma vez que o produto a ser trocado esteja de volta ao nosso Centro de Distribuição, a nova mercadoria será enviada o quanto antes.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Qual é o endereço para envio de produtos a serem trocados?',
            'description'  => 'O produto a ser devolvido deverá ser enviado para:
                               Chico Rei
                               Caixa Postal 45045
                               Juiz de Fora - MG
                               CEP 36.010-972
                               A peça desejada para troca deve ser informada, para que a reserva seja feita. Vale lembrar que ela deve estar disponível em nosso site.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Como cancelar um pedido já enviado?',
            'description'  => 'Para cancelar um pedido enviado, você deve entrar em contato com nossa equipe de atendimento o quanto antes, através do email contato@chicorei.com.br ou pelo telefone (32) 3015-9521. Além disso, é importante que você recuse o recebimento da encomenda.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Como cancelar um pedido que ainda não foi enviado?',
            'description'  => 'Para realizar o cancelamento de um pedido não enviado, basta entrar em contato com nossa equipe o quanto antes, enviando email para contato@chicorei.com.br ou através do telefone (32) 3015-9521, solicitando que o cancelamento seja feito e informando o número do pedido em questão.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Como cancelar um pedido que ainda não foi pago?',
            'description'  => 'Nesse caso, basta não realizar o pagamento. O pedido será cancelado imediatamente dentro do prazo estipulado para cada modalidade.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Qual a segurança e privacidade de meus dados na Chico Rei?',
            'description'  => 'O site da Chico Rei é protegido por certificado SSL, o que representa o máximo da segurança no quesito compras online. Qualquer informação pessoal que você inserir em nosso site será criptografada e os seus dados serão protegidos. Além disso, somente você terá acesso a sua senha.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Pagamentos por Cartão de Crédito são realizados de forma segura?',
            'description'  => 'Todos os pagamentos por cartão de crédito são realizados em ambiente totalmente seguro, oferecido pela própria operadora do cartão.
                               Alguns bancos, como Bradesco, Itaú, Citibank, HSBC e Santander, exigem que seja digitada uma senha ou que alguns dados pessoais sejam confirmados. Esse é um procedimento padrão, visando apenas a maior segurança do cliente.
                               Alguns pedidos podem passar por uma verificação de autenticidade do titular do cartão. Tudo isso para aumentar a segurança do cliente, evitando que sejam feitas compras com cartões clonados ou sem autorização por parte do portador do cartão. Durante a comprovação, não será necessário evidenciar nenhum tipo de valor ou o número do cartão.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'É possível parcelar uma compra?',
            'description'  => 'Compras por cartão de crédito e PayPal podem ser parceladas em até quatro vezes sem juros.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Condições de pagamento: Cartão de Crédito',
            'description'  => 'As compras por cartão (Visa, Mastercard e Dinners) são aprovadas pelas respectivas operadoras em até um dia útil, normalmente mais rápido que isso.
                               Assim que a confirmação do pagamento for passada pela operadora, você receberá um email confirmando todo esse processo. É a partir dessa confirmação que o prazo de entrega começa a valer.
                               Caso os pedidos sejam cancelados, você receberá um email avisando. Fique ligado: o pagamento só vale quando você recebe o email de confirmação..
                               Alguns pedidos podem passar por uma verificação de autenticidade do titular do cartão. Tudo isso para aumentar a segurança do cliente, evitando que sejam feitas compras com cartões clonados ou sem autorização por parte do portador do cartão. Durante a comprovação, não será necessário evidenciar nenhum tipo de valor ou o número do cartão.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Condições de pagamento: Boleto Bancário',
            'description'  => 'Nas compras feitas nessa modalidade, o sistema vai gerar automaticamente um boleto para o usuário. Os boletos possuem prazo para pagamento de até três dias corridos.
                               Após o pagamento do mesmo, o banco pode levar até três dias úteis para confirmar o pagamento. A partir dessa confirmação, será processado o envio do pedido.
                               Caso precise de uma segunda via, você mesmo poderá gerar no painel do usuário, clicando aqui e fazendo login no site.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Condições de pagamento: Depósito Bancário e Transferência',
            'description'  => 'Ao optar por essa modalidade, você receberá nossos dados bancários. Trabalhamos com Banco do Brasil, Caixa Econômica Federal e Itaú, fique à vontade para escolher o que for melhor para você.
                               Vale lembrar que, nesse tipo de pagamento, o cliente deverá enviar um email confirmando data, valor e número do pedido, além de mandar em anexo o comprovante da operação. Só a partir deste envio que o prazo de entrega começa a correr.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Condições de pagamento: PayPal',
            'description'  => 'Nessa modalidade, as compras são processadas e aprovadas pelo próprio PayPal, em até um dia útil (nos casos de cartão de crédito). Ao usar a modalidade "Cheque Digital", a confirmação pode levar até três dias úteis. O envio do pedido é processado após a confirmação no pagamento, a ser notificada por email. Caso tenha alguma dúvida sobre pagamentos por PayPal, clique aqui.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Como proceder quando meu pedido é cancelado?',
            'description'  => 'Caso ocorra algum problema no pagamento, o pedido será automaticamente cancelado. Após essa confirmação de cancelamento, você pode realizar um novo pedido, sem problema algum. Caso queira mais informações, pode entrar em contato conosco através do email contato@chicorei.com.br',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);

        DB::table('faqs')->insert([
            'title'        => 'Meu pedido ainda esta aguardando pagamento e eu já efetuei o pagamento por boleto bancário, por quê??',
            'description'  => 'Fique tranquilo, o pagamento do boleto é confirmado automaticamente pelo banco, no prazo de 3 dias úteis. Passado o prazo, é só entrar em contato pelo e-mail contato@chicorei.com.br.',
            'created_at'   => '2015-11-11 11:49:00',
            'updated_at'   => '2015-11-11 11:49:00'
        ]);
    }
}
