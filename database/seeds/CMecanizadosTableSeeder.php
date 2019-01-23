<?php

use Illuminate\Database\Seeder;
use App\Models\CMecanizado;
use App\Models\FuncionarioCMecanizado;

class CMecanizadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store = CMecanizado::create([
            'id_usuario'     => '1',
            'id_trator'      => '1',
            'id_implemento'      => '3',
            'apelido'      => 'Conj. Teste1',
        ]);

        FuncionarioCMecanizado::create([
            'id_usuario'        => '1',
            'id_funcionario'    => '1',
            'id_c_mecanizado'   => $store->id,
        ]);
        
        $store = CMecanizado::create([
            'id_usuario'     => '1',
            'id_trator'      => '2',
            'id_implemento'      => '4',
            'apelido'      => 'Conj. Teste2',
        ]);

        FuncionarioCMecanizado::create([
            'id_usuario'        => '1',
            'id_funcionario'    => '2',
            'id_c_mecanizado'   => $store->id,
        ]);
    }
}
