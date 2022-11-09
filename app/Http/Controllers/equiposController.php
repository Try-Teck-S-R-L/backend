<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipos;
use App\Models\preinscripcions;
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
            ['idDelegado', $request->idDelegado],
            ['idPreinscipcion', $request->idPreinscipcion]
        )->get();
        return $equipo;
    }

    public function filtrarLista(Request $request)
    {

        $equipo = DB::table('equipos')->join('categorias', 'equipos.idCategoria', '=', 'categorias.idCategoria')
            ->where('idDelegado', '=', $request->idDelegado)
            ->select('equipos.idEquipo', 'equipos.nombreEquipo', 'categorias.nombreCategoria', 'equipos.paisEquipo')->get();
        return $equipo;
    }





    public function obtener(Request $request)
    {
        //$equipo = Equipo::all()->where('delegado_idDelegado', Session::get('loginId'))->get();
        //$equipo = DB::table('equipos')->get();
        //$idAux =  Session::get('loginId');
        //$equipo = DB::table('equipos')->where('delegado_idDelegado', $request->idDelegado)->get();
        $equipo = DB::table('equipos')->join('categorias', 'equipos.idCategoria', '=', 'categorias.idCategoria')
            ->select('equipos.idEquipo', 'equipos.nombreEquipo', 'categorias.nombreCategoria', 'equipos.paisEquipo')->get();
        return $equipo;
        return response(['message', $request->all()]);
    }


    public function informacionEquipo(Request $request)
    {
        $equipo = DB::table('equipos')
            ->join('categorias', 'equipos.idCategoria', '=', 'categorias.idCategoria')
            ->join('delegados', 'equipos.idDelegado', '=', 'delegados.idDelegado')
            ->where('idEquipo', '=', $request->idEquipo)
            ->select('equipos.*', 'delegados.nombreDelegado', 'delegados.apellidoDelegado', 'categorias.nombreCategoria')
            ->first();

        return $equipo;
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
        //validaciones jugador
        $request->validate([
            //'idEquipo' => 'bail|required|unique:equipos',
            //'nombreEquipo' => 'required|unique:equipos',
            //'procedenciaEquipo' => 'required',
            'colorCamiseta' => 'nullable',
            //'logoEquipo' => 'nullable',
        ]);
        $preinscripcion = DB::table('preinscripcions')
            ->where('idPreinscripcion', $request->idPreinscripcion)->first();

        //return $request;


        $equipo = new equipos();
        //$equipo->idEquipo = $request->idEquipo;
        $equipo->nombreEquipo = $preinscripcion->nombreEquipo;
        $equipo->paisEquipo = $preinscripcion->paisEquipo;

        $equipo->colorCamisetaPrincipal = $request->colorCamisetaPrincipal;
        $equipo->colorCamisetaSecundario = $request->colorCamisetaSecundario;
        //$equipo->logoEquipo = $request->logoEquipo;

        $equipo->idDelegado = $preinscripcion->idDelegado;
        $equipo->idCategoria = $preinscripcion->idCategoria;
        $equipo->idPreinscripcion = $request->idPreinscripcion;


        if ($request->hasFile('logoEquipo')) {

            $logo = $request->file('logoEquipo');
            $completeFileName = $request->file('logoEquipo')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('logoEquipo')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;

            $carpetas = 'logosEquipos/';
            $path = $logo->move($carpetas, $compPic);
            $equipo->logoEquipo = $path;
        }

        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)
            ->update(array('habilitado' => 4));

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
        $equipo = equipos::findOrFail($request->id);
        $equipo->idEquipo = $request->idEquipo;
        $equipo->nombreEquipo = $request->nombreEquipo;
        $equipo->paisEquipo = $request->paisEquipo;

        $equipo->logoEquipo = $request->logoEquipo;
        $equipo->colorCamisetaPrincipal = $request->colorCamisetaPrincipal;
        $equipo->colorCamisetaSecundario = $request->colorCamisetaSecundario;

        $equipo->idDelegado = $request->idDelegado;
        $equipo->idCategoria = $request->idCategoria;
        $equipo->idPreinscripcion = $request->idPreinscripcion;

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
        $equipos = equipos::destroy($request->id);
        return $equipos;
    }
}
