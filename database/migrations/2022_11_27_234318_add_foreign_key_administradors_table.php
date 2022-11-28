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
        Schema::table('administradors', function (Blueprint $table) {
            $table->integer('idUser')->unsigned();

            $table->foreign('idUser')->references('idUser')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('administradors', function (Blueprint $table) {
            $table->dropForeign('administradors_idUser_foreign');
        });
    }
};
