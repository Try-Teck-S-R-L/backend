<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delegados;
use Illuminate\Support\Facades\DB;

class DelegadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delegados = Delegados::all();
        return $delegados;
    }

    /**
     * Show the form for creating a new resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function obtenerInfoDelegado(Request $request)
    {
        $delegado = DB::table('delegados')->where(
            'idDelegado',
            '=',
            $request->idDelegado
        )->first();

        return $delegado;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $delegados = new Delegados();
        $delegados->idDelegado = $request->idDelegado;
        $delegados->nombreDelegado = $request->nombreDelegado;
        $delegados->apellidoDelegado = $request->apellidoDelegado;
        $delegados->nacionalidadDelegado = $request->nacionalidadDelegado;
        $delegados->edadDelegado = $request->edadDelegado;
        $delegados->correoDelegado = $request->correoDelegado;
        $delegados->contraseniaDelegado = $request->contraseniaDeleado;


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
        $delegado = Delegados::findOrFail($request->id);
        $delegado->idDelegado = $request->idDelegado;
        $delegado->nombreDelegado = $request->nombreDelegado;
        $delegado->apellidoDelegado = $request->apellidoDelegado;
        $delegado->nacionalidadDelegado = $request->nacionalidadDelegado;
        $delegado->edadDelegado = $request->edadDelegado;
        $delegado->correoDelegado = $request->correoDelegado;
        $delegado->contraseniaDelegado = $request->contraseniaDeleado;

        $delegado->save();
        return $delegado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delegados = Delegados::destroy($request->id);
        return $delegados;
    }
}
