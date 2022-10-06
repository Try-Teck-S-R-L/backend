<?php

namespace App\Http\Controllers;

use App\Models\Preinscripcion;
use Illuminate\Http\Request;

class PreinscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preinscripciones = Preinscripcion::all();
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
        $preinscripciones = new Preinscripcion();
        $preinscripciones->categoria = $request->categoria;
        $preinscripciones->emailDelegado = $request->emailDelegado;
        $preinscripciones->nombreDelegado = $request->nombreDelegado;
        $preinscripciones->fechaPreinscripcion = $request->fechaPreinscripcion;
        $preinscripciones->nombreEquipo = $request->nombreEquipo;
        $preinscripciones->paisEquipo = $request->paisEquipo;
        //$preinscripciones->voucherPreinscripcion = $request->voucherPreinscripcion;

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
