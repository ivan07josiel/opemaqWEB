<?php

use Illuminate\Database\Seeder;
use App\Models\Trator;

class TratoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trator::create([
            'apelido'              => 'Colheitadeira',
            'id_usuario'        => '1',
            'etrator'              => '1',
            'marca'             => 'John Deere',
            'novo'           => '140000',
            'valor'         => '800000',
            'vida_util'   => '2500',
            'tdp'              => '540',
            'tracao'       => '4x4',
            'transmissao'   => 'Mecânica',
            'lastro'        => '500',
            'motor'       => '1',
            'cilindro'       => '1',
            'sucata'       => '1',
            'horas_estimadas'       => '1',
            'aspiracao'       => '1',
            'potencia'       => '1',
            'ano'       => '1',
            'uso_anual'       => '1',
            'hidraulico'       => '1',
            'cor'       => 'Vermelho',
        ]);
        
        Trator::create([
            'apelido'              => 'Semeadora',
            'id_usuario'        => '1',
            'etrator'              => '1',
            'marca'             => 'New Holland',
            'novo'           => '500000',
            'valor'         => '150000',
            'vida_util'   => '2500',
            'tdp'              => '1000',
            'tracao'       => '4x4',
            'transmissao'   => 'hidraulica',
            'lastro'        => '300',
            'motor'       => '1',
            'cilindro'       => '1',
            'sucata'       => '1',
            'horas_estimadas'       => '1',
            'aspiracao'       => '1',
            'potencia'       => '1',
            'ano'       => '1',
            'uso_anual'       => '1',
            'hidraulico'       => '1',
            'cor'       => 'Vermelho',
        ]);
        
        Trator::create([
            'apelido'              => 'Cortadeira',
            'id_usuario'        => '1',
            'etrator'              => '0',
            'marca'             => 'Agrale',
            'novo'           => '850000',
            'vida_util'   => '2500',
            'tdp'              => '1000',
            'tracao'       => '4x4',
            'transmissao'   => 'Mecânica',
            'lastro'        => '100',
            'motor'       => '1',
            'cilindro'       => '1',
            'sucata'       => '1',
            'horas_estimadas'       => '1',
            'aspiracao'       => '1',
            'potencia'       => '1',
            'ano'       => '1',
            'uso_anual'       => '1',
            'hidraulico'       => '1',
            'cor'       => 'Verde',
        ]);
        
        Trator::create([
            'apelido'              => 'Irrigadora',
            'id_usuario'        => '1',
            'etrator'              => '0',
            'marca'             => 'Massey Ferguson',
            'novo'           => '165000',
            'vida_util'   => '2500',
            'tdp'              => '540',
            'tracao'       => '4x4',
            'transmissao'   => 'Hidraulica',
            'lastro'        => '100',
            'motor'       => '1',
            'cilindro'       => '1',
            'sucata'       => '1',
            'horas_estimadas'       => '1',
            'aspiracao'       => '1',
            'potencia'       => '1',
            'ano'       => '1',
            'uso_anual'       => '1',
            'hidraulico'       => '1',
            'cor'       => 'Amarelo',
        ]);
    }
}
