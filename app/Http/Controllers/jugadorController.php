<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jugador;
use Illuminate\Support\Facades\DB;

class JugadorController extends Controller
{


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
            //->join('equipos', 'equipos.nombreEquipo', '=',  $request->idEquipo)
            //->join('categorias', 'categorias.idCategoria', 'jugadors.idCategoria')
            //->select('jugadors.*', 'categorias.nombreCategoria')
            ->where('idEquipo', $request->idEquipo)->get();

        return $jugadores;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

            $carpetas = 'fotosPerfiles/';
            $path = $fotoCi->move($carpetas, $compPic);
            $jugador->fotoCiJugador = $path;
        }


        $jugador->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function borrarJug(Request $request)
    {

        //$jugador = jugador::destroy($id);
        $jugador = DB::table('jugadors')->where('ciJugador', $request->ciJugador)->delete();

        return $jugador;
    }
}
