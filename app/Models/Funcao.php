<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Funcao extends Model
{
    // Define a qual tabela o model esta relacionado
    protected $table = 'funcoes';

    // Define quais campos serão aceitos para inserção no BD
    protected $fillable = [
        'nome', 'id_usuario',
    ];

    // Desativa recurso de BD timestamps do laravel
    public $timestamps = false;   
    
}
