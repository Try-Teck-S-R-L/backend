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
        Schema::create('_inscripcion_jugadors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('categoria');
            $table->string('nombresJugador');
            $table->string('apellidosJugador');
            $table->string('nacionalidadJugador');
            $table->string('tallaJugador');
            $table->integer('nroCamisetaJugador');
            $table->integer('edadJugador');
            $table->String('posicionJugador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_inscripcion_jugadors');
    }
};
