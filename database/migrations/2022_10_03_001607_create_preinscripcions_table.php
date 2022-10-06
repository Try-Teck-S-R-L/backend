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
            $table->id();
            $table->string('categoria');
            $table->string('nombreDelegado');
            $table->string('emailDelegado');
            $table->date('fechaPreinscripcion');
            $table->string('nombreEquipo');
            $table->string('paisEquipo');
            $table->File('voucherPreinscripcion');
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
