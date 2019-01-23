<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planejamento extends Model
{
    // Define quais campos serão aceitos para inserção no BD
    protected $fillable = [
        'id_usuario', 'nome', "id_operacao", "td", "nt", "ndf", "nimp", "jt",
        "eg", "ro", "at", "cct", "l", "vcce", "numpcce", "eccce",
        "cce", "tm", "tp", "ti", "tpr", "cco", "atot", "nc",
        "numpcct", "vcct", "tpro", "timp", "efc"
    ];

    // Desativa recurso de BD timestamps do laravel
    public $timestamps = false;
}
