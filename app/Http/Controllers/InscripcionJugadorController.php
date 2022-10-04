<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InscripcionJugador;

class InscripcionJugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripcionJugador = InscripcionJugador::all();
        return $inscripcionJugador;
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
        $inscripcionJugador = new InscripcionJugador();
        $inscripcionJugador -> categoria = $request->categoria;
        $inscripcionJugador -> nombresJugador = $request->categoria;
        $inscripcionJugador -> apellidosJugador = $request->categoria;
        $inscripcionJugador -> nacionalidadJugador = $request->categoria;
        $inscripcionJugador -> tallaJugador = $request->categoria;
        $inscripcionJugador -> nroCamisetaJugador = $request->categoria;
        $inscripcionJugador -> edadJugador = $request->categoria;
        $inscripcionJugador -> posicionJugador = $request->categoria;
        $inscripcionJugador -> save();
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inscripcionJugador = InscripcionJugador::destroy($id);
        return $inscripcionJugador;
    }
}
