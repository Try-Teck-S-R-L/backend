<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class solicitud_delegado extends Controller
{


    public function store(Request $request)
    {
        $solicitud  = DB::table('solicitud_delegado')->insert(
            array(
                'id' => $request->id,
                'nombreDelegado' => $request->nombreDelegado,
                'correoDelegado' => $request->correoDelegado,
                'estado' => 'en espera'
            )
        );

        return $solicitud;
    }

    public function aceptarDelegado(Request $request) //habilita una preinscripcion que estaba en espera
    {
        $resultado = DB::table('solicitud_delegado')->where(
            'id',
            $request->id
        )
            ->update(array('estado' => 'aprobada'));


        $preins = DB::table('solicitud_delegado')->where(
            'id',
            $request->id
        )
            ->first();

        $delegado  = DB::table('delegados')->insert(
            array(
                'id' => $preins->id,
                'nombreDelegado' => $preins->nombreDelegado,
                'correoDelegado' => $preins->correoDelegado,
                'estado' => 'habilitado'
            )
        );

        return $delegado;
    }



    public function rechazarDelegado(Request $request) //habilita una preinscripcion que estaba en espera
    {
        $resultado = DB::table('solicitud_delegado')->where(
            'id',
            $request->id
        )->update(array('estado' => 'rechazada'));

        return $resultado;
    }
}
