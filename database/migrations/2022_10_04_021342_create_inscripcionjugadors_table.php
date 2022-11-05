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
        Schema::create('inscripcionjugadors', function (Blueprint $table) {
            $table->id('ciJugador');
            $table->timestamps();
            $table->string('categoria');
            $table->string('nombreJugador');
            $table->string('apellidoJugador');
            $table->string('nacionalidadJugador');
            $table->string('tallaJugador');
            $table->integer('numeroCamiseta');
            $table->integer('edadJugador');
            $table->String('posicionJugador');
            //$table->File('fotoPerfilJugador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripcionjugadors');
    }
};
