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
        Schema::create('equipos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombreEquipo');
            $table->string('procedenciaEquipo');
            $table->string('colorCamiseta');
            $table->string('logoEquipo');
            //llaves foraneas
            $table->integer('delegado_idDelegado')->unsigned();
            $table->integer('categoria_idCategoria')->unsigned();
            $table->integer('preInscripcion_idPreinscripcion')->unsigned();

            $table->foreign('delegado_idDelegado')->references('idDelegado')
                ->on('delegado');
            $table->foreign('categoria_idCategoria')->references('idCategoria')
                ->on('categoria');
            $table->foreign('preInscripcion_idPreinscripcion')->references('idpreInscipcion')
                ->on('preinscripcions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
};
