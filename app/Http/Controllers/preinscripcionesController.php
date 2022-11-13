<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\preinscripcions;
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
        $preinscripciones = DB::table('preinscripcions')
            ->where(
                'habilitado',
                '=',
                $noHabilitado
            )
            ->join('delegados', 'preinscripcions.idDelegado', '=', 'delegados.idDelegado')
            ->select('preinscripcions.*', 'delegados.nombreDelegado')
            ->get();
        return $preinscripciones;
    }







    public function obtenerEquipo(Request $request)
    {
        $equipo = DB::table('preinscripcions')->where(
            ['idPreinscipcion', $request->id]
        )->get();
        return $equipo;
    }

    public function obtenerPreinscIndividual(Request $request)
    {
        //$equipo = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)->first();
        $preinscripcion = DB::table('preinscripcions')
            ->where('idPreinscripcion', $request->idPreinscripcion)
            ->join('categorias', 'preinscripcions.idCategoria', '=', 'categorias.idCategoria')
            ->join('delegados', 'preinscripcions.idDelegado', '=', 'delegados.idDelegado')
            ->first();
        return $preinscripcion;
        return response(['message', $request->all()]);
    }

    public function obtenerDatosPreinscripcionAprobada(Request $request)
    {
        $preinscripcion = DB::table('preinscripcions')
            ->where('idPreinscripcion', $request->idPreinscripcion)
            ->join('categorias', 'preinscripcions.idCategoria', '=', 'categorias.idCategoria')
            ->join('delegados', 'preinscripcions.idDelegado', '=', 'delegados.idDelegado')
            ->select('delegados.nombreDelegado', 'delegados.apellidoDelegado', 'preinscripcions.nombreEquipo', 'categorias.nombreCategoria')
            ->first();
        return $preinscripcion;
    }



    public function obtenerPreinscripcionesAprobadas(Request $request)
    {
        $preinscripciones = DB::table('preinscripcions')->where('idDelegado', '=', $request->idDelegado)
            ->where('habilitado', '=', 1)->get();

        return $preinscripciones;
    }

    public function aceptarPreinscripcion(Request $request)
    {
        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)
            ->update(array('habilitado' => 1));

        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)->first();

        return $preinscripcion;
    }

    public function rechazarPreinscripcion(Request $request)
    {
        //$preinscripciones = preinscripciones::destroy($request->idpreInscripcion);
        $preinscripciones = DB::table('preinscripcions')->where('idPreinscripcion', '=', $request->idPreinscripcion)->delete();
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
        $validator = validator($request->all(), [
            //'idPreinscripcion' => 'bail|required|unique:preinscripcion',
            //'nombreDelegado' => 'required',
            //'email' => 'required|email',
            'nombreEquipo' => 'required|unique:preinscripcions',
            'paisEquipo' => 'required',
            'nroComprobante' => 'required',
            'montoPago' => 'required|numeric',
            'fechaPreinscripcion' => 'required|before_or_equal:2022/12/12',
            'voucherPreinscripcion' => 'required|image',
            'idCategoria' => 'required',
            'idDelegado' => 'required',

        ], [
            'nombreEquipo.unique' => 'Este nombre es repetido',
            'voucherPreinscripcion' => 'Debe subir la imagen del voucher'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        //return $request;

        $preinscripcion = new preinscripcions();
        //$preinscripcion->idPreinscripcion = $request->idPreinscripcion;
        $preinscripcion->habilitado = 0;

        $preinscripcion->fechaPreinscripcion = $request->fechaPreinscripcion;
        $preinscripcion->nombreEquipo = $request->nombreEquipo;
        $preinscripcion->paisEquipo = $request->paisEquipo;
        $preinscripcion->nroComprobante = $request->nroComprobante;
        $preinscripcion->montoPago = $request->montoPago;


        $preinscripcion->idDelegado = $request->idDelegado;
        $preinscripcion->idCategoria = $request->idCategoria;

        if ($request->hasFile('voucherPreinscripcion')) {

            $voucher = $request->file('voucherPreinscripcion');
            $completeFileName = $request->file('voucherPreinscripcion')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('voucherPreinscripcion')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;

            $url = 'http://127.0.0.1:8000/';
            $carpetas = 'fotosVoucher/';
            $path = $voucher->move($carpetas, $compPic);
            $urlFinal = $url . '' . $path;
            $preinscripcion->voucherPreinscripcion = $urlFinal;
        }

        $preinscripcion->save();
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
        $preinscripciones = preinscripcions::destroy($id);
        return $preinscripciones;
    }
}
