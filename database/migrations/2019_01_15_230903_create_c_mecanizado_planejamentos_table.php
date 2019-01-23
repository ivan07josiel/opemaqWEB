<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCMecanizadoPlanejamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_mecanizado_planejamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

            $table->integer('id_planejamento')->unsigned();
            $table->foreign('id_planejamento')->references('id')->on('planejamentos')->onDelete('cascade');

            $table->integer('id_c_mecanizado')->unsigned();
            $table->foreign('id_c_mecanizado')->references('id')->on('c_mecanizados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_mecanizado_planejamentos');
    }
}
