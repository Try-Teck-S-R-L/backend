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
        Schema::create('delegados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idDelegado');
            $table->string('nombreDelegado');
            //$table->string('apellidoDelegado');
            $table->string('correoDelegado');
            $table->string('estado');
            //$table->string('contraseniaDelegado');
            //$table->string('nacionalidadDelegado');
            //$table->integer('edadDelegado');
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
        Schema::dropIfExists('delegados');
    }
};
