<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValorTableTratores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tratores', function (Blueprint $table) {
            $table->string('valor', 50)
                ->nullable()
                ->after('modelo');
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
            $table->dropColumn('valor');
        });
    }
}
