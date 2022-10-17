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
        $jugador->apellidoJugador = $request->apellidoJugador;
        $jugador->numeroCamiseta = $request->numeroCamiseta;
        $jugador->categoria = $request->categoria;
        $jugador->edadJugador = $request->edadJugador;
        //$jugador->fotoPerfilJugador = $request->fotoPerfilJugador;
        //$jugador->fotoCiJugador = $request->fotoCiJugador;
        $jugador->nacionalidadJugador = $request->nacionalidadJugador;
        $jugador->posicionJugador = $request->posicionJugador;
        $jugador->tallaJugador = $request->tallaJugador;

        if ($request->hasFile('fotoPerfilJugador')) {

            $voucher = $request->file('fotoPerfilJugador');
            $completeFileName = $request->file('fotoPerfilJugador')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('fotoPerfilJugador')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
            $path = $voucher->move('fotosPerfiles/', $compPic);
            $jugador->voucherPreinscripcion = $path;
        }

        if ($request->hasFile('fotoCiJugador')) {

            $voucher = $request->file('fotoCiJugador');
            $completeFileName = $request->file('fotoCiJugador')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('fotoCiJugador')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
            $path = $voucher->move('fotosCis/', $compPic);
            $jugador->voucherPreinscripcion = $path;
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
        $jugador = jugador::findOrFail($request->id);
        $jugador->nombreJugador = $request->nombreJugador;
        $jugador->apellidoJugador = $request->apellidoJugador;
        $jugador->numeroCamiseta = $request->numeroCamiseta;
        $jugador->categoria = $request->categoria;
        $jugador->edadJugador = $request->edadJugador;
        // $jugador->fotoPerfilJugador = $request->fotoPerfilJugador;
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
    public function destroy($id)
    {
        $jugador = jugador::destroy($id);

        return $jugador;
    }
}
