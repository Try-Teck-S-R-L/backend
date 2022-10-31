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
<<<<<<< HEAD:database/migrations/2022_10_10_225712_create_categorias_table.php
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombreValor');
=======
        Schema::create('preinscripciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idPreinscripcion');
            $table->string('nombreDelegado');
            $table->string('email');
            $table->string('nombreEquipo');
            $table->string('pais');
            $table->string('categoria');
            $table->string('numeroComprobante');
            $table->integer('montoPago');
            $table->date('fechaPago');
            $table->string('fotoComprobante');
>>>>>>> delegado:database/migrations/2022_10_28_203927_create_preinscripciones_table.php
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
        Schema::dropIfExists('categorias');
    }
};
