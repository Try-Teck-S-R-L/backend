<?php

namespace App\Http\Controllers;

use App\Models\Preinscripcion;
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
        //$preinscripciones = preinscripciones::all();
        $noHabilitado = 0;
        $preinscripciones = DB::table('preinscripciones')->where(
            'habilitado',
            '=',
            $noHabilitado
        )->get();
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

    public function obtenerPreinscripcionesAprobadas(Request $request)
    {
        $preinscripciones = DB::table('preinscripciones')->where('idDelegado', '=', $request->idDelegado)
            ->where('habilitado', '=', 1)->get();

        return $preinscripciones;
    }

    public function aceptarPreinscripcion(Request $request)
    {
        $preinscripcion = DB::table('preinscripciones')->where('idPreinscripcion', $request->idPreinscripcion)
            ->update(array('habilitado' => 1));

        $preinscripcion = DB::table('preinscripciones')->where('idPreinscripcion', $request->idPreinscripcion)->first();
        //$preinscripcion->estaHabilitado = 'true';

        //$preinscripcion = preinscripciones::find($request->idPreinscripcion);
        //$preinscripcion->habilitado = true;
        //$preinscripcion->save();
        return $preinscripcion;
    }

    public function rechazarPreinscripcion(Request $request)
    {
        //$preinscripciones = preinscripciones::destroy($request->idpreInscripcion);
        $preinscripciones = DB::table('preinscripciones')->where('idPreinscripcion', '=', $request->idPreinscripcion)->delete();
        return $preinscripciones;
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
        //validaciones preinscripciones
        $request->validate([
            'idPreinscripcion' => 'bail|required|unique:preinscripcion',
            'nombreDelegado' => 'required',
            'email' => 'required|email',
            'nombreEquipo' => 'required|unique:equipos',
            'pais' => 'required',
            'categoria' => 'required',
            'numeroComprobante' => 'required|numeric',
            'montoPago' => 'required|numeric',
            'fechaPago' => 'required|before_or_equal:2022/12/12',
            'fotoComprobante' => 'required|image'
        ]);
        $preinscripciones = new preinscripciones();
        $preinscripciones->idPreinscripcion = $request->idPreinscripcion;
        $preinscripciones->habilitado = 0;
        $preinscripciones->nombreDelegado = $request->nombreDelegado;
        $preinscripciones->email = $request->email;
        $preinscripciones->fecha = $request->fecha;
        $preinscripciones->nombreEquipo = $request->nombreEquipo;
        $preinscripciones->pais = $request->paisEquipo;
        $preinscripciones->numeroComprobante = $request->numeroComprobante;
        $preinscripciones->montoPago = $request->montoPago;
        $preinscripciones->fechaPreinscripcion = $request->fechaPreinscripcion;
        //$preinscripciones->fotoComprobante = $request->voucherPreinscripcion;
        $preinscripciones->idDelegado = $request->idDelegado;
        $preinscripciones->idCategoria = $request->idCategoria;

        if ($request->hasFile('voucherPreinscripcion')) {

            $voucher = $request->file('voucherPreinscripcion');
            $completeFileName = $request->file('voucherPreinscripcion')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('voucherPreinscripcion')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
        }
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
