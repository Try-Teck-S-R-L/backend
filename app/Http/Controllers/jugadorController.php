<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jugador;
use Illuminate\Support\Facades\DB;

class JugadorController extends Controller
{


    public function __construct()
    {
        //$this->middleware('auth.role:delegado');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugador = jugador::all(); //trae todos los registros
        return $jugador;
    }


    public function obtenerJugadoresDeUnEquipo(Request $request)
    {

        //$url = 'http://127.0.0.1:8000/';
        $jugadores = DB::table('jugadors')
            ->orderBy('nombreJugador')
            //->join('equipos', 'equipos.nombreEquipo', '=',  $request->idEquipo)
            //->join('categorias', 'categorias.idCategoria', 'jugadors.idCategoria')
            //->select('jugadors.*', 'categorias.nombreCategoria')
            ->where('idEquipo', $request->idEquipo)->get();

        return $jugadores;
    }

    public function obtenerJugadoresDelTorneo(Request $request)
    {

        //$url = 'http://127.0.0.1:8000/';
        $jugadores = DB::table('jugadors')
            ->join('equipos', 'equipos.idEquipo', '=',  'jugadors.idEquipo')
            ->orderBy('nombreJugador')
            ->get();

        return $jugadores;
    }




    public function obtenerJugador(Request $request)
    {

        $jugadores = DB::table('jugadors')
            ->where('ciJugador', $request->ciJugador)
            ->join('equipos', 'equipos.idEquipo', '=',  'jugadors.idEquipo')
            ->first();

        return $jugadores;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $categoria = DB::table('equipos')
            ->where('idEquipo', $request->idEquipo)
            ->join('categorias', 'categorias.idCategoria', '=', 'equipos.idCategoria')
            ->first();




        if ($request->edadJugador < 30 || $request->edadJugador > 70) {
            $validator = validator($request->all(), [

                'ciJugador' => 'required | unique:jugadors',
                'fotoPerfilJugador' => 'required|image',
                'fotoCiJugador' => 'required|image',
                'edadJugador' => '|gt:30|lt:70',

            ], [
                'ciJugador' => 'Este jugador ya esta registrado en el sistema',
                'fotoPerfilJugador' => 'Debe subir  una foto de perfil',
                'fotoCiJugador' => 'Debe subir una foto del documento de identidad',
                'edadJugador.gt' => 'El jugador debe ser mayor de 30 años para participar',
                'edadJugador.lt' => 'El jugador debe ser menor de 70 años para participar'
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }
        }

        $validator = validator($request->all(), [

            'ciJugador' => 'required | unique:jugadors',
            'fotoPerfilJugador' => 'required|image',
            'fotoCiJugador' => 'required|image',
            'edadJugador' => '|gte:' . $categoria->edadMinima . '|lte:' . $categoria->edadMaxima,

        ], [
            'ciJugador' => 'Este jugador ya esta registrado en el sistema',
            'fotoPerfilJugador' => 'Debe subir  una foto de perfil',
            'fotoCiJugador' => 'Debe subir una foto del documento de identidad',
            'edadJugador' => 'El jugador no pertenece a esta categoria, es menor de ' . $categoria->edadMinima . ' años'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }


        $jugador = new jugador();

        $jugador->ciJugador = $request->ciJugador;
        $jugador->nombreJugador = $request->nombreJugador;
        $jugador->apellidoJugador = $request->apellidoJugador;
        $jugador->numeroCamiseta = $request->numeroCamiseta;

        $jugador->edadJugador = $request->edadJugador;
        //$jugador->fotoPerfilJugador = $request->fotoPerfilJugador;
        //$jugador->fotoCiJugador = $request->fotoCiJugador;
        $jugador->nacionalidadJugador = $request->nacionalidadJugador;
        $jugador->posicionJugador = $request->posicionJugador;
        $jugador->tallaJugador = $request->tallaJugador;
        $jugador->idEquipo = $request->idEquipo;


        if ($request->hasFile('fotoPerfilJugador')) {

            $fotoPerfil = $request->file('fotoPerfilJugador');
            $completeFileName = $request->file('fotoPerfilJugador')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('fotoPerfilJugador')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;

            $url = 'http://127.0.0.1:8000/';
            $carpetas = 'fotosPerfiles/';
            $path = $fotoPerfil->move($carpetas, $compPic);
            //$urlFinal = $url . '' . 'fotosPerfiles/' . '' . $compPic;
            $urlFinal = $url . '' . $path;
            $jugador->fotoPerfilJugador = $urlFinal;
            //$jugador->fotoPerfilJugador = $path;
        }

        if ($request->hasFile('fotoCiJugador')) {

            $fotoCi = $request->file('fotoCiJugador');
            $completeFileName = $request->file('fotoCiJugador')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('fotoCiJugador')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;

            $carpetas = 'fotosCis/';
            $path = $fotoCi->move($carpetas, $compPic);
            $jugador->fotoCiJugador = $path;
        }


        $jugador->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jugador = new jugador();

        $jugador->ciJugador = $request->ciJugador;
        $jugador->nombreJugador = $request->nombreJugador;
        $jugador->apellidoJugador = $request->apellidoJugador;
        $jugador->numeroCamiseta = $request->numeroCamiseta;

        $jugador->edadJugador = $request->edadJugador;
        //$jugador->fotoPerfilJugador = $request->fotoPerfilJugador;
        //$jugador->fotoCiJugador = $request->fotoCiJugador;
        $jugador->nacionalidadJugador = $request->nacionalidadJugador;
        $jugador->posicionJugador = $request->posicionJugador;
        $jugador->tallaJugador = $request->tallaJugador;

        $jugador->save();

        return $jugador;
    }

    public function borrarJug(Request $request)
    {
        //$jugador = jugador::destroy($id);
        $jugador = DB::table('jugadors')->where('ciJugador', $request->ciJugador)->delete();

        return $jugador;
    }
}
