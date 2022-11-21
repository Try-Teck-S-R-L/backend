<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class generalController extends Controller
{
    //


    public function verificarFechaValida()
    {
        $fechasFin = DB::table('fechas')
            ->where('id', '=', 3)
            ->first();

        $finalTorneo = $fechasFin->fechaLimite;

        $fechaActual = now()->format('y-m-d');

        $respuesta = 1;
        if ($fechaActual < $finalTorneo) {

            $respuesta = 0;
        }

        return $respuesta;
    }
}
