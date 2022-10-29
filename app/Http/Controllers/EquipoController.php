<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Preinscripcion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$equipo = Equipo::all()->where('delegado_idDelegado', Session::get('loginId'))->get();
        $equipo = DB::table('equipos')->get();
        $idAux =  Session::get('loginId');
        //$equipo = DB::table('equipos')->where('delegado_idDelegado', $idAux)->get();
        return $equipo;
    }

    public function obtener(Request $request)
    {
        //$equipo = Equipo::all()->where('delegado_idDelegado', Session::get('loginId'))->get();
        //$equipo = DB::table('equipos')->get();
        //$idAux =  Session::get('loginId');
        $equipo = DB::table('equipos')->where('delegado_idDelegado', $request->idDelegado)->get();
        return $equipo;
        return response(['message', $request->all()]);
    }


    public function prueba2()
    {
        return response(['message', Session::get('loginId')]);
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
        $equipo = new Equipo();
        $equipo->id = $request->id;
        $equipo->nombreEquipo = $request->nombreEquipo;
        $equipo->procedenciaEquipo = $request->procedenciaEquipo;
        $equipo->colorCamiseta = $request->colorCamiseta;
        $equipo->logoEquipo = $request->logoEquipo;
        $equipo->delegado_idDelegado = $request->delegado_idDelegado;
        $equipo->categoria_idCategoria = $request->categoria_idCategoria;
        $equipo->preInscripcion_idPreinscripcion = $request->preInscripcion_idPreinscripcion;

        $equipo->save();
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
        $equipo = Equipo::findOrFail($request->id);
        $equipo->id = $request->id;
        $equipo->nombreEquipo = $request->nombreEquipo;
        $equipo->procedenciaEquipo = $request->procedenciaEquipo;
        $equipo->colorCamiseta = $request->colorCamiseta;
        $equipo->logoEquipo = $request->logoEquipo;
        $equipo->delegado_idDelegado = $request->delegado_idDelegado;
        $equipo->categoria_idCategoria = $request->categoria_idCategoria;
        $equipo->preInscripcion_idPreinscripcion = $request->preInscripcion_idPreinscripcion;

        $equipo->save();
        return $equipo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $equipo = Equipo::destroy($request->id);
        return $equipo;
    }
}
