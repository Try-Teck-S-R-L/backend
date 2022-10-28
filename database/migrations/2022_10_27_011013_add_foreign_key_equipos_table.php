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
            $table->integer('delegado_idDelegado')->unsigned();
            $table->integer('categoria_idCategoria')->unsigned();
            $table->integer('preInscripcion_idPreinscripcion')->unsigned();

            $table->foreign('delegado_idDelegado')->references('idDelegado')
            ->on('delegado');
            $table->foreign('categoria_idCategoria')->references('idCategoria')
            ->on('categoria');
            $table->foreign('preInscripcion_idPreinscripcion')->references('idpreInscipcion')
            ->on('preInscripcions');
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
            $table->dropForeign('equipos_delegado_idDelegado_foreign');
            $table->dropForeign('equipos_categoria_idCategoria_foreign');
            $table->dropForeign('equipos_preInscripcion_idPreinscripcion_foreign');
        });
    }
};
