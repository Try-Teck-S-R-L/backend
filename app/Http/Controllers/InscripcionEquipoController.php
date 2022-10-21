<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InscripcionEquipo;

class InscripcionEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $EquiposInscritos = InscripcionEquipo::all();
        return $EquiposInscritos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $InscripcionEquipo = new InscripcionEquipo();
        $InscripcionEquipo->Nombre_del_delegado = $request->Nombre_del_Delegado;
        $InscripcionEquipo->Nombre_del_equipo = $request->Nombre_del_equipo;
        $InscripcionEquipo->Categoria = $request->Categoria;
        $InscripcionEquipo->Pais = $request->Pais;

        $InscripcionEquipo->save();
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
        InscripcionEquipo::destroy($id);
        
    }
}
