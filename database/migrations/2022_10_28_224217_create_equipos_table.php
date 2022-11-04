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
            $table->increments('idEquipo');
            $table->string('nombreEquipo');
            $table->string('procedenciaEquipo');
            $table->string('colorCamiseta');
            $table->string('logoEquipo');
            //llaves foraneas
            $table->integer('idDelegado')->unsigned();
            $table->integer('idCategoria')->unsigned();
            $table->integer('idPreinscripcion')->unsigned();

            $table->foreign('idDelegado')->references('idDelegado')
                    ->on('delegados');
            $table->foreign('idCategoria')->references('idCategoria')
                    ->on('categorias');
            $table->foreign('idPreinscripcion')->references('idPreinscripcion')
            ->on('preinscripciones');
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
