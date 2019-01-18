<?php

use Illuminate\Database\Seeder;
use App\Models\Propriedade;

class PropriedadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Propriedade::create([
            'nome'              => 'Fazenda Lais',
            'id_usuario'        => '1',
            'data'              => '2017-10-10',
            'valor'             => '6000000',
            'tamanho'           => '190',
            'percuso_manobra'   => '2',
            'solo'              => 'arenoso',
            'declividade'       => '3-8',
            'fertilidade'       => 'media',
            'relevo'            => 'ondulado'
        ]);
        
        Propriedade::create([
            'nome'              => 'Fazenda Alto Santo',
            'id_usuario'        => '1',
            'data'              => '2015-10-10',
            'valor'             => '4200000',
            'tamanho'           => '1650',
            'percuso_manobra'   => '3',
            'solo'              => 'arenoso',
            'declividade'       => '3-8',
            'fertilidade'       => 'media',
            'relevo'            => 'ondulado'
        ]);
        
        Propriedade::create([
            'nome'              => 'Fazenda G-pasf',
            'id_usuario'        => '1',
            'data'              => '2016-08-10',
            'valor'             => '8000000',
            'tamanho'           => '2450',
            'percuso_manobra'   => '3',
            'solo'              => 'arenoso',
            'declividade'       => '3-8',
            'fertilidade'       => 'media',
            'relevo'            => 'ondulado'
        ]);
    }
}
