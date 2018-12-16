<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropriedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propriedades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDdelete('cascade');
            $table->string('nome');
            $table->date('data');
            $table->double('valor');
            $table->integer('tamanho');
            $table->integer('percuso_manobra');
            $table->string('solo', 25);
            $table->string('declividade', 25);
            $table->string('fertilidade', 25);
            $table->string('relevo', 25);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propriedades');
    }
}
