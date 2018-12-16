<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCMecanizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_mecanizados', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

            $table->integer('id_trator')->unsigned()->nullable();
            $table->foreign('id_trator')->references('id')->on('tratores')->onDelete('set null');

            $table->integer('id_implemento')->unsigned()->nullable();
            $table->foreign('id_implemento')->references('id')->on('tratores')->onDelete('set null');

            $table->string('apelido', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_mecanizados');
    }
}
