<?php

use Illuminate\Database\Seeder;
use App\Models\Operacao;

class OperacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Operacao::create([
            'id_usuario'      => '1',
            'id_propriedade'     => '1',
            'nome'     => 'Operação 1',
            'data_inicio'     => '2019-02-10',
            'data_fim'     => '2019-02-15',
        ]);
      
        Operacao::create([
            'id_usuario'      => '1',
            'id_propriedade'     => '2',
            'nome'     => 'Operação 2',
            'data_inicio'     => '2019-02-05',
            'data_fim'     => '2019-02-08',
        ]);
      
        Operacao::create([
            'id_usuario'      => '1',
            'id_propriedade'     => '2',
            'nome'     => 'Operação 3',
            'data_inicio'     => '2019-02-19',
            'data_fim'     => '2019-02-21',
        ]);
      
        Operacao::create([
            'id_usuario'      => '1',
            'id_propriedade'     => '3',
            'nome'     => 'Operação 4',
            'data_inicio'     => '2019-02-12',
            'data_fim'     => '2019-02-13',
        ]);
    }
}
