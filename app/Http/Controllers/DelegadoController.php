<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delegado;

class DelegadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delegados = Delegado::all();
        return $delegados;
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
        $delegados = new Delegado();
        $delegados->idDelegado = $request->idDelegado;
        $delegados->nombreDelegado = $request->nombreDelegado;
        $delegados->apellidoDelegado = $request->apellidoDelegado;
        $delegados->nacionalidadDelegado = $request->nacionalidadDelegado;
        $delegados->edadDelegado = $request->edadDelegado;
        $delegados->correoDelegado = $request->correoDelegado;
        $delegados->contraseniaDelegado = $request ->contraseniaDeleado;


        $delegados->save();
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
        $delegados = Delegado::findOrFail($request->id);
        $delegados->idDelegado = $request->idDelegado;
        $delegados->nombreDelegado = $request->nombreDelegado;
        $delegados->apellidoDelegado = $request->apellidoDelegado;
        $delegados->nacionalidadDelegado = $request->nacionalidadDelegado;
        $delegados->edadDelegado = $request->edadDelegado;
        $delegados->correoDelegado = $request->correoDelegado;
        $delegados->contraseniaDelegado = $request ->contraseniaDeleado;

        $delegados->save();
        return $delegados;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delegados = Delegado::destroy($request->id);
        return $delegados;
    }
}
