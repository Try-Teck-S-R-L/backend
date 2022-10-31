<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipos;
use Illuminate\Support\Facades\DB;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = equipos::all();
        return $equipos;
    }









    public function obtenerEquipo(Request $request)
    {
        $equipo = DB::table('preinscripciones')->where(
            ['delegado_idDelegado', $request->idDelegado],
            ['idpreInscipcion', $request->idpreInscipcion]
        )->get();
        return $equipo;
    }

    public function filtrarLista(Request $request)
    {
        //$equipo = DB::table('equipos')->get();
        /*$equipo = DB::table('equipos')->select('equipos.idPreinscripcion')
            ->get();*/
        $equipo = DB::table('equipos')->where('idDelegado', '=', $request->idDelegado)->get();
        return $equipo;
    }





    public function obtener(Request $request)
    {
        //$equipo = Equipo::all()->where('delegado_idDelegado', Session::get('loginId'))->get();
        //$equipo = DB::table('equipos')->get();
        //$idAux =  Session::get('loginId');
        //$equipo = DB::table('equipos')->where('delegado_idDelegado', $request->idDelegado)->get();
        $equipo = DB::table('equipos')->join('categorias', 'equipos.idCategoria', '=', 'categorias.idCategoria')
            ->select('equipos.idEquipo', 'equipos.nombreEquipo', 'categorias.nombreCategoria', 'equipos.procedenciaEquipo')->get();
        return $equipo;
        return response(['message', $request->all()]);
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
        $equipos = new equipos();
        $equipos->idEquipo = $request->idEquipo;
        $equipos->nombreEquipo = $request->nombreEquipo;
        $equipos->procedenciaEquipo = $request->procedenciaEquipo;
        $equipos->colorCamiseta = $request->colorCamiseta;
        $equipos->logoEquipo = $request->logoEquipo;
        $equipos->idDelegado = $request->idDelegado;
        $equipos->idCategoria = $request->idCategoria;
        $equipos->idPreinscripcion = $request->idPreinscripcion;

        $equipos->save();
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
        $equipos = equipos::findOrFail($request->id);
        $equipos->idEquipo = $request->idEquipo;
        $equipos->nombreEquipo = $request->nombreEquipo;
        $equipos->procedenciaEquipo = $request->procedenciaEquipo;
        $equipos->colorCamiseta = $request->colorCamiseta;
        $equipos->logoEquipo = $request->logoEquipo;
        $equipos->idDelegado = $request->idDelegado;
        $equipos->idCategoria = $request->idCategoria;
        $equipos->idPreinscripcion = $request->idPreinscripcion;

        $equipos->save();
        return $equipos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipos = equipos::destroy($id);
        return $equipos;
    }
}
