<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jugador;

class jugadorController extends Controller
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
        $jugador->nombreJugador = $request->nombreJugador;
        $jugador->telefonoJug = $request->telefonoJug;
        $jugador->fec_nac_jug = $request->fec_nac_jug;
        $jugador->nacionalidad = $request->nacionalidad;
        $jugador->equipo = $request->equipo;

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
        $jugador = jugador::findOrFail($request->id);
        $jugador->nombreJugador = $request->nombreJugador;
        $jugador->telefonoJug = $request->telefonoJug;
        $jugador->fec_nac_jug = $request->fec_nac_jug;
        $jugador->nacionalidad = $request->nacionalidad;
        $jugador->equipo = $request->equipo;

        $jugador->save();

        return $jugador;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jugador = jugador::destroy($id);

        return $jugador;
    }
}
