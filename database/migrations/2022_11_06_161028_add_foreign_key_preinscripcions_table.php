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
        Schema::table('preinscripcions', function (Blueprint $table) {
            $table->integer('idDelegado')->unsigned();
            $table->integer('idCategoria')->unsigned();

            $table->foreign('idDelegado')->references('idDelegado')
                ->on('delegados');
            $table->foreign('idCategoria')->references('idCategoria')
                ->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preinscripcions', function (Blueprint $table) {
            $table->dropForeign('preinscripcions_idDelegado_foreign');
            $table->dropForeign('preinscripcions_idCategoria_foreign');
        });
    }
};
