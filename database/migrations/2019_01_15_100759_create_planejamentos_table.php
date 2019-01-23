<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanejamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planejamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDdelete('cascade');
            
            $table->integer('id_operacao')->unsigned();
            $table->foreign('id_operacao')->references('id')->on('users')->onDdelete('cascade');
            
            $table->string('nome', 50);
            $table->double('td');
            $table->double('nt');
            $table->double('ndf');
            $table->double('nimp');
            $table->double('jt');
            $table->double('eg');
            $table->double('at');
            $table->double('ro');
            $table->double('atot');
            $table->double('cct');
            $table->double('l');
            $table->double('vcct');
            $table->double('numpcct');
            $table->double('eccce');
            $table->double('cce');
            $table->double('vcce');
            $table->double('numpcce');
            $table->double('tm');
            $table->double('tp');
            $table->double('ti');
            $table->double('tpr');
            $table->double('cco');
            $table->double('nc');
            $table->double('efc');
            $table->double('tpro');
            $table->double('timp');

            /*
            NOMENCLATURAS
            TD   - Tempo Disponível(horas)
            Nt   - N° dias para a operação
            Ndf  - N° domingos e feriados
            Nimp - N° dias utéis improprios para o trabalho(Solo argioloso - arenoso)
            Jt   - Jornada de trabalho
            Eg   - Eficiência gerencial
            RO   - Ritmo Operacional(ha/h)
            At   - Área a ser trabalhada(ha)
            CcT  - Capacidade de campo Teórica(ha/h)
            L    - Largura de trabalho(m)
            V    - Velocidade(km/h)
            Nump  - Número de Passadas
            Ec   - Eficiência de campo
            CcE  - Capacidade de campo Efetiva(ha/h)
            TM   - Tempo de Máquina
            TP   - Tempo de Produção
            TI   - Tempo de Interrupção
            TPr  - Tempo de preparo
            CcO  - Capacidade de Campo Operacional
            Atot   - Área total(ha)
            NC   - Número de Conjuntos
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planejamentos');
    }
}
