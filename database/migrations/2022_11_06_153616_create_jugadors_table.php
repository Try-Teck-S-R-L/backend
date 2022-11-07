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
        Schema::create('jugadors', function (Blueprint $table) {
            $table->id('ciJugador');
            //$table->integer('ciJugador');
            $table->string('nombreJugador');
            $table->string('apellidoJugador');
            $table->integer('numeroCamiseta');
            $table->integer('edadJugador');
            $table->string('fotoPerfilJugador');
            $table->string('fotoCiJugador');
            $table->string('nacionalidadJugador');
            $table->string('posicionJugador');
            $table->string('tallaJugador');


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
        Schema::dropIfExists('jugadors');
    }
};
