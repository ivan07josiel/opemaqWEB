<?php

use Illuminate\Database\Seeder;
use App\Models\Funcionario;

class FuncionariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionario::create([
            'nome'      => 'Ivan Josiel',
            'id_usuario'     => '1',
            'funcao'     => '1',
            'data_admissao'     => '2018-10-10',
            'data_nascimento'     => '1988-11-10',
            'salario'     => '1500',
            'encargos'     => '1',
            'insalubridade'     => '1',
            'periculosidade'     => '1',
            'inss'     => '1',
            'fgts'     => '1',
            'agua'     => '1',
            'luz'     => '1',
            'aluguel'     => '1',
            'experiencia'     => '1',
        ]);
        
        Funcionario::create([
            'nome'      => 'Igor Melo',
            'id_usuario'     => '1',
            'funcao'     => '2',
            'data_admissao'     => '2018-10-10',
            'data_nascimento'     => '1992-10-12',
            'salario'     => '1100',
            'encargos'     => '1',
            'insalubridade'     => '1',
            'periculosidade'     => '1',
            'inss'     => '1',
            'fgts'     => '1',
            'agua'     => '1',
            'luz'     => '1',
            'aluguel'     => '1',
            'experiencia'     => '1',
        ]);

    }
}
