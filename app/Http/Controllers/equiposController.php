<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipos;
use Illuminate\Support\Facades\DB;

class EquiposController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth.role:delegado');
    }


    public function index() // devuelve todos los equipos del torneo
    {
        $equipo = DB::table('equipos')->get();
        return $equipo;
    }

    public function obtenerEquipo(Request $request) //obtiene la informacion del equipo correspondiente
    {                                               // al id del delegado y de preinscripcion que recibe
        $equipo = DB::table('preinscripciones')->where(
            ['idDelegado', $request->idDelegado],
            ['idPreinscipcion', $request->idPreinscipcion]
        )->get();
        return $equipo;
    }

    public function equiposDelegado(Request $request) //obtiene la informacion de los equipos, categoria y delegado
    {                                              //del id delegado que recibe

        $equipo = DB::table('equipos')->join('categorias', 'equipos.idCategoria', '=', 'categorias.idCategoria')
            ->where('idDelegado', '=', $request->idDelegado)
            ->select('equipos.idEquipo', 'equipos.nombreEquipo', 'categorias.nombreCategoria', 'equipos.paisEquipo')
            ->get();
        return $equipo;
    }


    public function obtener(Request $request) // devuelve la informacion de todos los equipos y categoria del sistema
    {
        $equipo = DB::table('equipos')->join('categorias', 'equipos.idCategoria', '=', 'categorias.idCategoria')
            ->select('equipos.idEquipo', 'equipos.nombreEquipo', 'categorias.nombreCategoria', 'equipos.paisEquipo')->get();
        return $equipo;
    }


    public function informacionEquipo(Request $request) //devuelve la informacion de un equipo, su categoria y delegado
    {                                                   //segun el id que recibe
        $equipo = DB::table('equipos')
            ->join('categorias', 'equipos.idCategoria', '=', 'categorias.idCategoria')
            ->join('delegados', 'equipos.idDelegado', '=', 'delegados.idDelegado')
            ->where('idEquipo', '=', $request->idEquipo)
            ->select('equipos.*', 'delegados.nombreDelegado', 'categorias.nombreCategoria')
            ->first();

        return $equipo;
    }

    public function store(Request $request)   //guarda la informacion de un equipo en la base de datos
    {
        $preinscripcion = DB::table('preinscripcions')
            ->where('idPreinscripcion', $request->idPreinscripcion)->first();

        $aux = $request->colorCamisetaPrincipal;
        $validator = validator($request->all(), [

            'colorCamisetaPrincipal' => 'required',
            'colorCamisetaSecundario' => 'required| not_in:' . $aux,
            'logoEquipo' => 'required|image |dimensions:max_width=350,max_height=350'
        ], [
            'nombreEquipo.unique' => 'Este nombre ya se encuentra registrado en el sistema',
            'colorCamisetaSecundario.not_in' => 'No puede elegir el mismo color que la camiseta principal',
            'logoEquipo' => 'Tiene que subir el logo del equipo',
            'logoEquipo.dimensions' => 'El tamaño del logo no debe exceder de 350 x 350 pixeles'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        $equipo = new equipos();
        $equipo->nombreEquipo = $preinscripcion->nombreEquipo;
        $equipo->paisEquipo = $preinscripcion->paisEquipo;
        $equipo->colorCamisetaPrincipal = $request->colorCamisetaPrincipal;
        $equipo->colorCamisetaSecundario = $request->colorCamisetaSecundario;

        $equipo->idDelegado = $preinscripcion->idDelegado;
        $equipo->idCategoria = $preinscripcion->idCategoria;
        $equipo->idPreinscripcion = $request->idPreinscripcion;


        if ($request->hasFile('logoEquipo')) {

            $logo = $request->file('logoEquipo');
            $completeFileName = $request->file('logoEquipo')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('logoEquipo')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;

            $url = 'http://127.0.0.1:8000/';
            $carpetas = 'logosEquipos/';
            $path = $logo->move($carpetas, $compPic);
            $urlFinal = $url . '' . $path;
            $equipo->logoEquipo = $urlFinal;
        }

        $preinscripcion = DB::table('preinscripcions')->where('idPreinscripcion', $request->idPreinscripcion)
            ->update(array('habilitado' => 'inscrita'));

        $equipo->save();
    }
}
