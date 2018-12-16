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
            'data'              => '2015-10-10',
            'valor'             => '2040',
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
            'valor'             => '420',
            'tamanho'           => '650',
            'percuso_manobra'   => '3',
            'solo'              => 'arenoso',
            'declividade'       => '3-8',
            'fertilidade'       => 'media',
            'relevo'            => 'ondulado'
        ]);
    }
}
