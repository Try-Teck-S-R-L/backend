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
        $noHabilitado = 'en espera';
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
            ->where('habilitado', '=', 'en espera')
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
            ->where('habilitado', '=', 'aprobada')
            ->join('categorias', 'preinscripcions.idCategoria', '=', 'categorias.idCategoria')
            ->join('delegados', 'preinscripcions.idDelegado', '=', 'delegados.idDelegado')
            ->select('delegados.nombreDelegado', 'delegados.apellidoDelegado', 'preinscripcions.nombreEquipo', 'categorias.nombreCategoria')
            ->first();
        return $preinscripcion;
    }



    public function obtenerPreinscripcionesAprobadas(Request $request)
    {
        $preinscripciones = DB::table('preinscripcions')->where('idDelegado', '=', $request->idDelegado)
            ->where('habilitado', '=', 'aprobada')->get();

        return $preinscripciones;
    }

    public function obtenerPreinscripcionesEditables(Request $request)
    {
        $preinscripciones = DB::table('preinscripcions')->where('idDelegado', '=', $request->idDelegado)
            ->where('habilitado', '=', 'rechazada')
            ->orWhere('habilitado', '=', 'en espera')
            ->get();

        return $preinscripciones;
    }


    public function obtenerPreinscripcionesDelegado(Request $request)
    {
        $preinscripciones = DB::table('preinscripcions')
            ->where('idDelegado', '=', $request->idDelegado)
            ->join('categorias', 'preinscripcions.idCategoria', '=', 'categorias.idCategoria')
            //->join('delegados', 'delegados.idDelegado', '=', $request->idDelegado)
            ->select('preinscripcions.*', 'categorias.nombreCategoria')
            ->get();

        return $preinscripciones;
    }


    public function aceptarPreinscripcion(Request $request)
    {
        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)
            ->update(array('habilitado' => 'aprobada'));

        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)->first();

        return $preinscripcion;
    }

    public function rechazarPreinscripcion(Request $request)
    {
        /*$preinscripciones = DB::table('preinscripcions')->where('idPreinscripcion', '=', $request->idPreinscripcion)->delete();
        return $preinscripciones;*/
        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)
            ->update(array('habilitado' => 'rechazada'));

        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)->first();

        return $preinscripcion;
    }

    public function eliminarPreinscripcion(Request $request)
    {
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

        //$endDate = date('Y-m-d', strtotime("01/08/2022"));
        $fechasFin = DB::table('fechas')
            ->where('id', '=', 3)
            ->first();

        $finalTorneo = $fechasFin->fechaLimite;

        $fechasFin = DB::table('fechas')
            ->where('id', '=', 1)
            ->first();

        $inicioTorneo = $fechasFin->fechaLimite;

        $fechas = DB::table('fechas')
            ->where('id', '=', 2)
            ->first();


        if ($request->fechaPreinscripcion <= $fechas->fechaLimite) {

            //return 'hola';

            $validator = validator($request->all(), [
                //'idPreinscripcion' => 'bail|required|unique:preinscripcion',
                //'nombreDelegado' => 'required',
                //'email' => 'required|email',
                'nombreEquipo' => 'required|unique:preinscripcions|unique:equipos',
                'paisEquipo' => 'required',
                'nroComprobante' => 'required',
                'montoPago' => 'required| in:250',
                'fechaPreinscripcion' => 'after:' . $inicioTorneo,
                'voucherPreinscripcion' => 'required|image', //|dimensions:max_width=300,max_height=350
                'idCategoria' => 'required',
                'idDelegado' => 'required',


            ], [
                'nombreEquipo.unique' => 'Este nombre ya se encuentra registrado en el sistema',
                'montoPago' => 'Error en el monto 250',
                'fechaPreinscripcion' => 'Esta fecha excede el tiempo de inscripciones',
                'voucherPreinscripcion' => 'Debe subir la imagen del voucher'
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }
        }

        $validator = validator($request->all(), [
            //'idPreinscripcion' => 'bail|required|unique:preinscripcion',
            //'nombreDelegado' => 'required',
            //'email' => 'required|email',
            'nombreEquipo' => 'required|unique:preinscripcions|unique:equipos',
            'paisEquipo' => 'required',
            'nroComprobante' => 'required',
            'montoPago' => 'required| in:350',
            'fechaPreinscripcion' => 'before:' . $finalTorneo,
            'voucherPreinscripcion' => 'required|image', //|dimensions:max_width=300,max_height=350
            'idCategoria' => 'required',
            'idDelegado' => 'required',

        ], [
            'nombreEquipo.unique' => 'Este nombre ya se encuentra registrado en el sistema',
            'montoPago' => 'Error en el monto 350',
            'fechaPreinscripcion' => 'Esta fecha excede el tiempo de inscripciones',
            'voucherPreinscripcion' => 'Debe subir la imagen del voucher'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        //return $request;

        $preinscripcion = new preinscripcions();
        //$preinscripcion->idPreinscripcion = $request->idPreinscripcion;
        $preinscripcion->habilitado = 'en espera';

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
