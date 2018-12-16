<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratores', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            
            $table->boolean('etrator');
            $table->string('apelido', 50);
            $table->string('marca', 50)->nullable();
            $table->string('modelo', 50)->nullable();
            $table->string('novo', 50)->nullable();
            $table->string('vida_util', 50)->nullable();
            $table->string('tdp', 50)->nullable();
            $table->string('tracao', 50)->nullable();
            $table->string('motor', 50)->nullable();
            $table->string('cilindro', 50)->nullable();
            $table->string('sucata', 50)->nullable();
            $table->string('horas_estimadas', 50)->nullable();
            $table->string('aspiracao', 50)->nullable();
            $table->string('potencia', 50)->nullable();
            $table->string('ano', 4)->nullable();
            $table->string('uso_anual', 50)->nullable();
            $table->string('hidraulico', 50)->nullable();
            $table->string('cor', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratores');
    }
}
