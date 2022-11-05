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
            ['idPreinscipcion', $request->id]
        )->get();
        return $equipo;
    }

    public function obtenerPreinscIndiviidual(Request $request)
    {
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
        $preinscripciones = new preinscripciones();
        $preinscripciones->idPreinscripcion = $request->idPreinscripcion;
        $preinscripciones->habilitado = 0;
        /*$preinscripciones->nombreDelegado = $request->nombreDelegado;
        $preinscripciones->email = $request->emailDelegado;*/
        $preinscripciones->nombreEquipo = $request->nombreEquipo;
        $preinscripciones->paisEquipo = $request->paisEquipo;
        $preinscripciones->numeroComprobante = $request->numeroComprobante;
        $preinscripciones->montoPago = $request->montoPago;
        $preinscripciones->fechaPreinscripcion = $request->fechaPreinscripcion;

        $preinscripciones->idDelegado = $request->idDelegado;
        $preinscripciones->idCategoria = $request->idCategoria;

        if ($request->hasFile('voucherPreinscripcion')) {

            $voucher = $request->file('voucherPreinscripcion');
            $completeFileName = $request->file('voucherPreinscripcion')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('voucherPreinscripcion')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;

            $carpetas = 'fotosVoucher/';
            $path = $voucher->move($carpetas, $compPic);
            $preinscripciones->fotoComprobante = $path;
        }

        $preinscripciones->save();
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
