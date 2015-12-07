<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome_cliente'          => 'Rossina estamparia',
            'url_foto'              => 'http://localhost:8000/api/images/foto?user=id1',
            'nome_empresa'          => 'Rossina estamparia',
            'nome_fantasia'         => 'Rossina estamparia',
            'cnpj'                  => '000.0000.0000',
            'inscricao_estadual'    => '000.0000.000',
            'telefone'              => '22.3333.4444',
            'celular'               => '33.33333.3333',
            'celular_dois'          => '44.44444.4444',
            'fax'                   => '44.4444.4444',
            'email'                 => 'contato@rossinaestamparia.com.be',
            'site'                  => 'http://rossinaestamparia.com.br',
            'cep'                   => '23777-77',
            'cidade'                => 'São gonçalo',
            'uf'                    => 'rj',
            'endereco'              => 'Avenida Presidente Roosevelt, 130 parte, ',
            'numero'                =>  130,
            'complemento'           => 'laranjal',
            'obs'                   => 'nenhuma',
            'user_id'               =>  1,
            'created_at'            => '2015-10-23 10:10:10',
            'updated_at'            => '2015-10-23 10:10:10',
        ]);
    }
}
