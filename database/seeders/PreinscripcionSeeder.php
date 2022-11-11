<?php

namespace Database\Seeders;

use App\Models\preinscripcions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreinscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preinscripciones = new preinscripcions();
        $preinscripciones->fechaPreinscripcion = '2022-11-11';
        $preinscripciones->voucherPreinscripcion = "null";
        $preinscripciones->nombreEquipo = "Los pumas";
        $preinscripciones->paisEquipo="Bolvia";
        $preinscripciones->idDelegado=1;
        $preinscripciones->idCategoria=1;
        $preinscripciones->montoPago=80;
        $preinscripciones->nroComprobante="124352";
        $preinscripciones->habilitado=true;
        $preinscripciones->save();
    }
}
