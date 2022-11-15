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
        Schema::create('preinscripcions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idPreinscripcion');
            $table->date('fechaPreinscripcion');
            $table->string('voucherPreinscripcion');
            $table->string('nombreEquipo');
            $table->string('paisEquipo');
            $table->integer('montoPago');
            $table->string('habilitado');
            $table->string('nroComprobante');


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
        Schema::dropIfExists('preinscripcions');
    }
};
