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
        Schema::create('preinscripciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idPreinscripcion');
            $table->string('nombreDelegado');
            $table->string('email');
            $table->string('nombreEquipo');
            $table->string('pais');
            $table->string('numeroComprobante');
            $table->integer('montoPago');
            $table->date('fechaPreinscripcion');
            $table->string('fotoComprobante');
            $table->timestamps();

            $table->integer('idDelegado')->unsigned();
            $table->integer('idCategoria')->unsigned();

            $table->foreign('idDelegado')->references('idDelegado')
                ->on('delegados');
            $table->foreign('idCategoria')->references('idCategoria')
                ->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};
