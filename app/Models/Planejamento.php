<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planejamento extends Model
{
    // Define quais campos serão aceitos para inserção no BD
    protected $fillable = [
        'id_usuario', 'nome', "td", "nt", "ndf", "nimp", "jt",
        "eg", "ro", "at", "cct", "l", "v", "nump", "ec",
        "cce", "tm", "tp", "ti", "tpr", "cco", "atot", "nc"
    ];

    // Desativa recurso de BD timestamps do laravel
    public $timestamps = false;
}
