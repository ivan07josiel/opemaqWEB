<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransmissaoAndLastroTableTratores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tratores', function (Blueprint $table) {
            $table->string('transmissao', 50)
                ->nullable()
                ->after('cor');
            $table->string('lastro', 50)
                ->nullable()
                ->after('cor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tratores', function (Blueprint $table) {
            $table->dropColumn('transmissao');
            $table->dropColumn('lastro');
        });
    }
}
