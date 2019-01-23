<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMecanizadoPlanejamento extends Model
{
    // Define quais campos serão aceitos para inserção no BD
    protected $fillable = [
        'id_usuario', 'id_planejamento', 'id_c_mecanizado',
    ];

    // Desativa recurso de BD timestamps do laravel
    public $timestamps = false;  
}
