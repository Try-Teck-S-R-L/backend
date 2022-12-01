<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delegados;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DelegadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delegados = Delegados::all();
        return $delegados;
    }

    /**
     * Show the form for creating a new resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function obtenerInfoDelegado(Request $request)
    {
        $delegado = DB::table('delegados')->where(
            'idDelegado',
            '=',
            $request->idDelegado
        )->first();

        return $delegado;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validaciones delegado
        $request->validate([
            'idDelegado' => 'bail|required|unique:delegado',
            'nombreDelegado' => 'required',
            'apellidoDelegado' => 'required',
            'nacionalidadDelegado' => 'required',
            'edadelegadod' => 'required',
            'correoDelegado' => 'required|email',
            'contraseniaDelegado' => 'required|current_password',
        ]);

        $usuario = new User();

        $usuario->name = $request->nombreDelegado;
        $usuario->email = $request->correoDelegado;
        $usuario->password = $request->contraseniaDelegado;

        $usuario->save();



        $delegados = new Delegados();
        $delegados->idDelegado = $request->idDelegado;
        $delegados->nombreDelegado = $request->nombreDelegado;
        $delegados->apellidoDelegado = $request->apellidoDelegado;
        $delegados->correoDelegado = $request->correoDelegado;
        $delegados->contraseniaDelegado = $request->contraseniaDeleado;
        $delegados->nacionalidadDelegado = $request->nacionalidadDelegado;
        $delegados->edadDelegado = $request->edadDelegado;

        $delegados->save();
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
        $delegado = Delegados::findOrFail($request->id);
        $delegado->idDelegado = $request->idDelegado;
        $delegado->nombreDelegado = $request->nombreDelegado;
        $delegado->apellidoDelegado = $request->apellidoDelegado;
        $delegado->correoDelegado = $request->correoDelegado;
        $delegado->contraseniaDelegado = $request->contraseniaDeleado;
        $delegado->nacionalidadDelegado = $request->nacionalidadDelegado;
        $delegado->edadDelegado = $request->edadDelegado;

        $delegado->save();
        return $delegado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delegados = Delegados::destroy($request->id);
        return $delegados;
    }
}
