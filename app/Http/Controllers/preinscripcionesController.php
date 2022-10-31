<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\preinscripciones;
use Illuminate\Support\Facades\DB;

class PreinscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preinscripciones = preinscripciones::all();
        return $preinscripciones;
    }







    public function obtenerEquipo(Request $request)
    {
        $equipo = DB::table('preinscripciones')->where(
            ['idpreInscipcion', $request->id]
        )->get();
        return $equipo;
    }

    public function obtenerPreinscIndiviidual(Request $request)
    {
        //$equipo = Equipo::all()->where('delegado_idDelegado', Session::get('loginId'))->get();
        //$equipo = DB::table('equipos')->get();
        //$idAux =  Session::get('loginId');
        $equipo = DB::table('preinscripciones')->where('idPreinscripcion', $request->idPreinscripcion)->first();
        /*$equipo = DB::table('preinscripciones')->join('categorias', 'equipos.idCategoria', '=', 'categorias.idCategoria')
            ->select('equipos.idEquipo', 'equipos.nombreEquipo', 'categorias.nombreCategoria', 'equipos.procedenciaEquipo')->get();
        */
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
        $preinscripciones = new preinscripciones();
        $preinscripciones->idPreinscripcion = $request->idPreinscripcion;
        $preinscripciones->nombreDelegado = $request->nombreDelegado;
        $preinscripciones->email = $request->emailDelegado;
        $preinscripciones->nombreEquipo = $request->nombreEquipo;
        $preinscripciones->pais = $request->paisEquipo;
        $preinscripciones->numeroComprobante = $request->numeroComprobante;
        $preinscripciones->montoPago = $request->montoPago;
        $preinscripciones->fechaPreinscripcion = $request->fechaPreinscripcion;
        $preinscripciones->fotoComprobante = $request->voucherPreinscripcion;
        $preinscripciones->idDelegado = $request->idDelegado;
        $preinscripciones->idCategoria = $request->idCategoria;

        $preinscripciones->save();
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
        /* $preinscripciones->idPreinscripcion = $request->idPreinscripcion;
        $preinscripciones->nombreDelegado = $request->nombreDelegado;
        $preinscripciones->email = $request->email;
        $preinscripciones->fecha = $request->fecha;
        $preinscripciones->nombreEquipo = $request->nombreEquipo;
        $preinscripciones->pais = $request->pais;
        $preinscripciones->categoria = $request->categoria;
        $preinscripciones->numeroComprobante = $request->numeroComprobante;
        $preinscripciones->montoPago = $request->montoPago;
        $preinscripciones->fechaPago = $request->fechaPago;
        $preinscripciones->fotoComprobante = $request->fotoComprobante;
        
        $preinscripciones->save();
        return $preinscripciones;*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preinscripciones = preinscripciones::destroy($id);
        return $preinscripciones;
    }
}
