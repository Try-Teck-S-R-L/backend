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
            $table->string('paisEquipo');
            $table->string('logoEquipo');
            $table->string('colorCamisetaPrincipal');
            $table->string('colorCamisetaSecundario');



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
