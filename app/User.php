<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Funcionario;
use App\Models\Funcao;
use App\Models\Propriedade;
use App\Models\Trator;
use App\Models\CMecanizado;
use App\Models\FuncionarioCMecanizado;
use App\Models\Operacao;
use App\Models\Planejamento;
use App\Models\CMecanizadoPlanejamento;
use App\Models\DesempenhoFixo;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // Defindo relacionamentos entre usuario e tabelas
    public function propriedades()
    {
        return $this->hasMany(Propriedade::class, 'id_usuario');
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class, 'id_usuario');
    }

    public function funcoes()
    {
        return $this->hasMany(Funcao::class, 'id_usuario');
    }

    public function tratores()
    {
        return $this->hasMany(Trator::class, 'id_usuario');
    }

    public function c_mecanizados()
    {
        return $this->hasMany(CMecanizado::class, 'id_usuario');
    }
    public function funcionario_c_mecanizados()
    {
        return $this->hasMany(FuncionarioCMecanizado::class, 'id_usuario');
    }
    public function operacoes()
    {
        return $this->hasMany(Operacao::class, 'id_usuario');
    }
    public function planejamentos()
    {
        return $this->hasMany(Planejamento::class, 'id_usuario');
    }
    public function c_mecanizados_planejamentos()
    {
        return $this->hasMany(CMecanizadoPlanejamento::class, 'id_usuario');
    }
    public function desempenho_fixo()
    {
        return $this->hasMany(DesempenhoFixo::class, 'id_usuario');
    }
}
