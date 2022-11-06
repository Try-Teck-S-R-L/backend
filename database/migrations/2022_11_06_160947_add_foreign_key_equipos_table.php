<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipos', function (Blueprint $table) {
            $table->integer('idDelegado')->unsigned();
            $table->integer('idCategoria')->unsigned();
            $table->integer('idPreinscripcion')->unsigned();

            $table->foreign('idDelegado')->references('idDelegado')
            ->on('delegados');
            $table->foreign('idCategoria')->references('idCategoria')
            ->on('categorias');
            $table->foreign('idPreinscripcion')->references('idPreinscripcion')
            ->on('preinscripcions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipos', function (Blueprint $table) {
            $table->dropForeign('equipos_idEquipo_foreign');
            $table->dropForeign('equipos_idCategoria_foreign');
            $table->dropForeign('equipos_idPreinscripcion_foreign');
        
        });
    }
};
