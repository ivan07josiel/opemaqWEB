<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('nome', 50);
            
            $table->integer('funcao')->unsigned();
            $table->foreign('funcao')->references('id')->on('funcoes');
            
            $table->date('data_admissao');
            $table->date('data_nascimento');
            $table->double('encargos')->nullable();
            $table->double('insalubridade')->nullable();
            $table->double('periculosidade')->nullable();
            $table->double('inss')->nullable();
            $table->double('fgts')->nullable();
            $table->double('agua')->nullable();
            $table->double('luz')->nullable();
            $table->double('aluguel')->nullable();
            $table->string('experiencia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
