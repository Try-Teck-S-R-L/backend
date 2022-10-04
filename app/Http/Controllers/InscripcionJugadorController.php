<?php

namespace App\Http\Controllers;

use App\Models\Inscripcionjugador;
use Illuminate\Http\Request;

class InscripcionjugadorController extends Controller
{


    public function index()
    {
        $inscripcionJugador = Inscripcionjugador::all();
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
        $inscripcionJugador = new Inscripcionjugador();
        $inscripcionJugador->categoria = $request->categoria;
        $inscripcionJugador->nombresJugador = $request->nombresJugador;
        $inscripcionJugador->apellidosJugador = $request->apellidosJugador;
        $inscripcionJugador->nacionalidadJugador = $request->nacionalidadJugador;
        $inscripcionJugador->tallaJugador = $request->tallaJugador;
        $inscripcionJugador->nroCamisetaJugador = $request->nroCamisetaJugador;
        $inscripcionJugador->edadJugador = $request->edadJugador;
        $inscripcionJugador->posicionJugador = $request->posicionJugador;
        $inscripcionJugador->save();
    }


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
