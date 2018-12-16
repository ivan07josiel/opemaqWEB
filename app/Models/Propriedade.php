<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propriedade extends Model
{
    // protected $table = 'propriedades';

    // Define quais campos serão aceitos para inserção no BD
    protected $fillable = [
        'id_usuario', 'nome', 'data', 'valor', 
        'tamanho', 'solo', 'percuso_manobra', 
        'declividade', 'fertilidade','relevo',
    ];

    // Desativa recurso de BD timestamps do laravel
    public $timestamps = false;
}
