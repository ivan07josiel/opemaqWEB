<?php

use Illuminate\Database\Seeder;
use App\Models\Funcao;

class FuncoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcao::create([
            'nome'      => 'Tratorista',
            'id_usuario'     => '1',
        ]);
        
        Funcao::create([
            'nome'      => 'Apicultor',
            'id_usuario'     => '1',
        ]);
    }
}
