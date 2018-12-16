<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuncionarioCMecanizado extends Model
{
    // Define quais campos serão aceitos para inserção no BD
    protected $fillable = [
        'id_usuario', 'id_funcionario', 'id_c_mecanizado',
    ];

    // Desativa recurso de BD timestamps do laravel
    public $timestamps = false;    
}
