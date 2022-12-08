<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class generalController extends Controller
{
    //


    public function getFechas()
    {
        $fechas = DB::table('fechas')->get();

        return $fechas;
    }

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

    public function uploadImage(Request $request)
    {
        $path = Storage::putFile('', $request->image);
        return response()->json(['path' => $path]);
    }

    public function getImage($path)
    {
        $image = Storage::get($path);
        //return $image;
        return response($image, 200)->header('Content-Type', Storage::get($path));
    }
}
