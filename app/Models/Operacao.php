<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    // Define a qual tabela o model esta relacionado
    protected $table = 'operacoes';

    // Define quais campos serão aceitos para inserção no BD
    protected $fillable = [
        'nome', 'id_usuario','data_inicio', 'data_fim', 'id_propriedade',
    ];

    // Desativa recurso de BD timestamps do laravel
    public $timestamps = false;   
}
