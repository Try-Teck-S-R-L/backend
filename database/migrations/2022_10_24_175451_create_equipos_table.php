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
            $table->id();
            $table->timestamps();
            $table->string('nombreEquipo');
            $table->string('procedenciaEquipo');
            $table->string('qrEquipo');
            //llaves foraneas
            $table->integer('delegado_idDelegado');
            $table->intger('categoria_idCategoria');
            $table->integer('preInscripcion_idPreinscripcion');

            $table->foreign('delegado_idDelegado')->references('idDelegado')
            ->on('delegado');
            $table->foreign('categoria_idCategoria')->references('idCategoria')
            ->on('categoria');
            $table->foreign('preInscripcion_idPreinscripcion')->references('idPreinscripcion')
            ->on('preInscripcionphp');
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
