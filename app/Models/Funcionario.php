<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    // Define quais campos serão aceitos para inserção no BD
    protected $fillable = [
        'id_usuario', 'nome', 'funcao', 'data_admissao', 
        'data_nascimento', 'encargos', 'insalubridade', 
        'periculosidade', 'inss','fgts', 'agua', 'luz', 
        'aluguel', 'experiencia', 'salario',
    ];

    // Desativa recurso de BD timestamps do laravel
    public $timestamps = false;    
}
