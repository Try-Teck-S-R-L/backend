<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class solicitud_delegado extends Controller
{

    public function index()
    {
        $solicitudes = DB::table('solicitud_delegado')
            ->get();
        return $solicitudes;
    }

    public function obtenerInfoSolicitud(Request $request)
    {
        $solicitudes = DB::table('solicitud_delegado')
            ->where('solicitud_delegado.id', '=', $request->id)
            ->first();
        return $solicitudes;
    }

    public function solicitudesEnEspera()
    {
        $solicitudes = DB::table('solicitud_delegado')
            ->where('solicitud_delegado.estado', '=', 'en espera')
            ->get();
        return $solicitudes;
    }


    public function store(Request $request)
    {

        /*$validator = validator($request->all(), [

            'id' => 'unique:solicitud_delegado'

        ], [
            'id.unique' => 'Este usuario ya envio una solicitud'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }*/

        $user = DB::table('users')
            ->where('users.id', '=', $request->id)
            ->first();


        $solicitud  = DB::table('solicitud_delegado')->insert(
            array(
                'id' => $request->id,
                'nombreDelegado' => $user->name,
                'correoDelegado' => $user->email,
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

        $resultado = DB::table('users')->where(
            'id',
            $request->id
        )
            ->update(array('role' => 'delegado'));


        $delegado  = DB::table('delegados')->insert(
            array(
                'idDelegado' => $preins->id,
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

        $resultado = DB::table('users')->where(
            'id',
            $request->id
        )->update(array('role' => 'usuario'));

        return $resultado;
    }
}
