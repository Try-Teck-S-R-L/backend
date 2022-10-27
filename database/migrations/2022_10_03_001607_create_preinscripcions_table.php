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
            $table->increments('idpreInscipcion');
            $table->string('nombreDelegado');
            $table->date('fecha');
            $table->string('nombreEquipo');
            $table->string('paisEquipo');
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
