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
        Schema::create('delegado', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombreDelegado');
            $table->string('apellidoDelegado');
            $table->string('nacionalidadDelegado');
            $table->integer('edadDelegado');
            $table->string('correoDelegado');
            $table->string('contraseniaDelegado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delegado');
    }
};
