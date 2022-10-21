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
        Schema::create('inscripcion_equipos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("NombreDelegado");
            $table->string("NombreEquipo");
            $table->string("Categoria");
            $table->string("Pais");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripcion_equipos');
    }
};
