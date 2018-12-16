<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMecanizado extends Model
{
    // Define quais campos serão aceitos para inserção no BD
    protected $fillable = [
        'id_usuario', 'apelido', 'id_trator', 'id_implemento'
    ];

    // Desativa recurso de BD timestamps do laravel
    public $timestamps = false;   
}
