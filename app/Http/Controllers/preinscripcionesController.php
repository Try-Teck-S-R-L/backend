<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\preinscripciones;
use DateTime;

class preinscripcionesController extends Controller
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
            'idPreinscripcion'=> 'bail|required|unique:preinscripcion',
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
        $preinscripciones->nombreDelegado = $request->nombreDelegado;
        $preinscripciones->email = $request->email;
        $preinscripciones->nombreEquipo = $request->nombreEquipo;
        $preinscripciones->pais = $request->pais;
        $preinscripciones->categoria = $request->categoria;
        $preinscripciones->numeroComprobante = $request->numeroComprobante;
        $preinscripciones->montoPago = $request->montoPago;
        $preinscripciones->fechaPago = $request->fechaPago;
        $preinscripciones->fotoComprobante = $request->fotoComprobante;

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
        $preinscripciones = preinscripciones::findOrFail($request->id);
        $preinscripciones->idPreinscripcion = $request->idPreinscripcion;
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
        return $preinscripciones;
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