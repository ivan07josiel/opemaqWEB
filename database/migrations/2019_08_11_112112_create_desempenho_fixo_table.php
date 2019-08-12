<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesempenhoFixoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desempenho_fixo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

            $table->integer('id_trator')->unsigned()->nullable();
            $table->foreign('id_trator')->references('id')->on('tratores')->onDelete('set null');

            $table->double('taxa_juros');
            $table->double('custo_alojamento_seguro');
            $table->double('depreciacao');
            $table->double('vida_util_horas');
            $table->double('impostos');
            $table->double('custo_fixo_total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desempenho_fixo');
    }
}
