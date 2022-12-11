<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\preinscripcions;
use Illuminate\Support\Facades\DB;

class PreinscripcionesController extends Controller
{

    public function __construct()
    {
        /* $this->middleware(
            'auth.role:administrador',
            ['except' => [
                'obtenerDatosPreinscripcionAprobada', 'obtenerPreinscripcionesAprobadas',
                'obtenerPreinscripcionesEditables', 'obtenerPreinscripcionesDelegado', 'store', 'update'
            ]]
        );*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()   //devuelve todas las preinscripciones que estan en espera, con la informacion de sus delegados
    {
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



    /** OFICIAL  */
    public function todasPreinscripcionesTorneo() //obtiene todas las preinscripciones del torneo
    {

        $preinscripciones = DB::table('preinscripcions')
            ->join('delegados', 'preinscripcions.idDelegado', '=', 'delegados.idDelegado')
            ->select('preinscripcions.*', 'delegados.nombreDelegado')
            ->get();
        return $preinscripciones;
    }


    public function obtenerPreinscIndividual(Request $request) //obtiene la preinscripcion q pide segun el id y que su estado este en espera
    {                                                          //junto con la informacion de su categoria y su delegado
        $preinscripcion = DB::table('preinscripcions')
            ->where('idPreinscripcion', $request->idPreinscripcion)
            ->where('habilitado', '=', 'en espera')
            ->join('categorias', 'preinscripcions.idCategoria', '=', 'categorias.idCategoria')
            ->join('delegados', 'preinscripcions.idDelegado', '=', 'delegados.idDelegado')
            ->first();
        return $preinscripcion;
    }


    public function obtenerPreinscGral(Request $request)     //obtiene la preinscripcion q pide segun el id y sin importar el estado
    {                                                        //junto con la informacion de su categoria y su delegado
        $preinscripcion = DB::table('preinscripcions')
            ->where('idPreinscripcion', $request->idPreinscripcion)
            ->join('categorias', 'preinscripcions.idCategoria', '=', 'categorias.idCategoria')
            ->join('delegados', 'preinscripcions.idDelegado', '=', 'delegados.idDelegado')
            ->first();
        return $preinscripcion;
    }

    public function obtenerDatosPreinscripcionAprobada(Request $request)  //devuelve la preinscripcion del id solicitado y la informacion
    //de su categoria y delegado, si esta esta aprobada
    {
        $preinscripcion = DB::table('preinscripcions')
            ->where('idPreinscripcion', $request->idPreinscripcion)
            ->where('habilitado', '=', 'aprobada')
            ->join('categorias', 'preinscripcions.idCategoria', '=', 'categorias.idCategoria')
            ->join('delegados', 'preinscripcions.idDelegado', '=', 'delegados.idDelegado')
            ->select('delegados.nombreDelegado', 'preinscripcions.nombreEquipo', 'categorias.nombreCategoria')
            ->first();
        return $preinscripcion;
    }



    public function obtenerPreinscripcionesAprobadas(Request $request) //obtiene todas las preinscripciones aprobadas de un delegado segun su id
    {                                                                  //con su categoria y la info de su delegado
        $preinscripciones = DB::table('preinscripcions')->where('idDelegado', '=', $request->idDelegado)
            ->where('habilitado', '=', 'aprobada')
            ->join('categorias', 'preinscripcions.idCategoria', '=', 'categorias.idCategoria')
            ->get();

        return $preinscripciones;
    }

    public function obtenerPreinscripcionesEditables(Request $request)  //obtiene todas las preinscripciones de un delegado
    {                                                                   //cuyo estado sea rechazado o en espera
        $preinscripciones = DB::table('preinscripcions')->where('idDelegado', '=', $request->idDelegado)
            ->where('habilitado', '=', 'rechazada')
            ->orWhere('habilitado', '=', 'en espera')
            ->get();

        return $preinscripciones;
    }


    public function obtenerPreinscripcionesDelegado(Request $request)  //obtiene todas las preinscripciones y sus categorias, de un delegado
    {
        $preinscripciones = DB::table('preinscripcions')
            ->where('idDelegado', '=', $request->idDelegado)
            ->join('categorias', 'preinscripcions.idCategoria', '=', 'categorias.idCategoria')
            ->select('preinscripcions.*', 'categorias.nombreCategoria')
            ->get();

        return $preinscripciones;
    }


    public function aceptarPreinscripcion(Request $request) //habilita una preinscripcion que estaba en espera
    {
        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)
            ->update(array('habilitado' => 'aprobada'));

        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)->first();

        return $preinscripcion;
    }

    public function rechazarPreinscripcion(Request $request) //rechaza una preinscripcion que estaba en espera
    {

        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)
            ->update(array('habilitado' => 'rechazada'));

        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)->first();

        return $preinscripcion;
    }

    public function eliminarPreinscripcion(Request $request) //elimina una preinscripcion de la base de datos
    {
        $preinscripciones = DB::table('preinscripcions')->where('idPreinscripcion', '=', $request->idPreinscripcion)->delete();
        return $preinscripciones;
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


            $validator = validator($request->all(), [

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
                'montoPago' => 'El monto de pago de esta fecha debe ser 250',
                'fechaPreinscripcion' => 'Esta fecha excede el tiempo de inscripciones',
                'voucherPreinscripcion' => 'Debe subir la imagen del voucher'
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }
        }

        if ($request->fechaPreinscripcion > $fechas->fechaLimite) {
            $validator = validator($request->all(), [
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
                'montoPago' => 'El monto de pago de esta fecha debe ser 350',
                'fechaPreinscripcion' => 'Esta fecha excede el tiempo de inscripciones',
                'voucherPreinscripcion' => 'Debe subir la imagen del voucher'
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }
            //return $request;
        }
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

    public function update(Request $request)
    {
        $preinscripcionActual = DB::table('preinscripcions')
            ->where('idPreinscripcion', $request->idPreinscripcion)
            ->first();

        if ($request->nombreEquipo != $preinscripcionActual->nombreEquipo) {
            $validator = validator($request->all(), [
                'nombreEquipo' => 'required|unique:preinscripcions|unique:equipos',
            ], [
                'nombreEquipo.unique' => 'Este nombre ya se encuentra registrado en el sistema'
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }
        }

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


            $validator = validator($request->all(), [


                'paisEquipo' => 'required',
                'nroComprobante' => 'required',
                'montoPago' => 'required| in:250',
                'fechaPreinscripcion' => 'after:' . $inicioTorneo,
                'idCategoria' => 'required',


            ], [
                'nombreEquipo.unique' => 'Este nombre ya se encuentra registrado en el sistema',
                'montoPago' => 'El monto de pago de esta fecha debe ser 250',
                'fechaPreinscripcion' => 'Esta fecha excede el tiempo de inscripciones'
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }
        }

        if ($request->fechaPreinscripcion > $fechas->fechaLimite) {
            $validator = validator($request->all(), [

                'paisEquipo' => 'required',
                'nroComprobante' => 'required',
                'montoPago' => 'required| in:350',
                'fechaPreinscripcion' => 'before:' . $finalTorneo,
                'idCategoria' => 'required',

            ], [
                'nombreEquipo.unique' => 'Este nombre ya se encuentra registrado en el sistema',
                'montoPago' => 'El monto de pago de esta fecha debe ser 350',
                'fechaPreinscripcion' => 'Esta fecha excede el tiempo de inscripciones'
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }
            //return $request;
        }
        $preinscripcion = new preinscripcions();
        /*$preinscripcion->habilitado = 'en espera';


        $preinscripcion->fechaPreinscripcion = $request->fechaPreinscripcion;
        $preinscripcion->nombreEquipo = $request->nombreEquipo;
        $preinscripcion->paisEquipo = $request->paisEquipo;
        $preinscripcion->nroComprobante = $request->nroComprobante;
        $preinscripcion->montoPago = $request->montoPago;*/


        //$preinscripcion->idDelegado = $request->idDelegado; ----
        $preinscripcion->idCategoria = $request->idCategoria;

        DB::table('preinscripcions')
            ->where('idPreinscripcion', $request->idPreinscripcion)
            ->update(array(
                'nombreEquipo' => $request->nombreEquipo,
                'habilitado' => 'en espera',
                'fechaPreinscripcion' => $request->fechaPreinscripcion,
                'nombreEquipo' => $request->nombreEquipo,
                'paisEquipo' => $request->paisEquipo,
                'nroComprobante' => $request->nroComprobante,
                'idCategoria' => $request->idCategoria
            ));

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

            DB::table('preinscripcions')
                ->where('idPreinscripcion', $request->idPreinscripcion)
                ->update(array(
                    'voucherPreinscripcion' => $preinscripcion->voucherPreinscripcion
                ));
        }
    }
}
