<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesempenhoFixo extends Model
{
    // Define a qual tabela o model esta relacionado
    protected $table = 'desempenho_fixo';

    // Define quais campos serão aceitos para inserção no BD
    protected $fillable = [
        'id_usuario', 'id_trator', 'taxa_juros', 'custo_alojamento_seguro', 
        'depreciacao', 'vida_util_horas', 'impostos', 'custo_fixo_total'
    ];

    // Desativa recurso de BD timestamps do laravel
    public $timestamps = false;   
}
