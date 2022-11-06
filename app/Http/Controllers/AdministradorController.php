<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrador = Administrador::all();
        return $administrador;
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
        $administrador = New Administrador();
        $administrador->idAdministrador = $request ->idAdministrador;
        $administrador->nombreAdministrador = $request ->nombreAdministrador;
        $administrador->correoAdministrador = $request ->correoAdministrador;
        $administrador->contraseniaAdministrador = $request ->contraseniaAdministrador;

        $administrador->save();
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
        $administrador = Administrador::findOrFail($request->id);
        $administrador->idAdministrador = $request ->idAdministrador;
        $administrador->nombreAdministrador = $request ->nombreAdministrador;
        $administrador->correoAdministrador = $request ->correoAdministrador;
        $administrador->contraseniaAdministrador = $request ->contraseniaAdministrador;
        $administrador->save();
        return $administrador;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $administrador = Administrador::destro($request->id);
        return $administrador;
    }
}
