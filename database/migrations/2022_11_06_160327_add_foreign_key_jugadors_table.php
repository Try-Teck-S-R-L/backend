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
        Schema::table('jugadors', function (Blueprint $table) {
            $table->integer('idEquipo')->unsigned();
            //$table->integer('idCategoria')->unsigned();

            $table->foreign('idEquipo')->references('idEquipo')
                ->on('equipos');
            /*$table->foreign('idCategoria')->references('idCategoria')
            ->on('categorias');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jugadors', function (Blueprint $table) {
            $table->dropForeign('jugadors_idEquipo_foreign');
            //$table->dropForeign('jugadors_idCategoria_foreign');
        });
    }
};
