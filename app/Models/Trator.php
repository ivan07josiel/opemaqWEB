<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trator extends Model
{
    protected $table = 'tratores';

    // Define quais campos serão aceitos para inserção no BD
    protected $fillable = [
        'id_usuario', 'apelido', 'marca', 'modelo', 'novo', 'transmissao',
        'vida_util', 'tdp', 'tracao', 'motor', 'cilindro', 'lastro',
        'sucata', 'horas_estimadas','aspiracao', 'potencia', 'ano',
        'uso_anual', 'hidraulico', 'cor', 'etrator', 'valor',

    ];

    // Desativa recurso de BD timestamps do laravel
    public $timestamps = false;
}
