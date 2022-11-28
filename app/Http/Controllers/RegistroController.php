<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use App\Models\delegados;
use App\Models\User;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(RegistroRequest $request)
    {
        //$usuario

        $usuario = new User();

        $usuario->name = $request->nombreDelegado;
        $usuario->email = $request->correoDelegado;
        $usuario->password = $request->contraseniaDelegado;

        $usuario->save();


        /*$delegado = new delegados();

        $delegado->nombreDelegado = $request->nombreDelegado;
        $delegado->apellidoDelegntraseniaDelegado = $request->contraseniaDelegado;
        $delegado->nacionalidadDelegado = $request->nacionalidadDelegado;
        $delegado->edadDelegado = 23;

        $delegado->save();*/
        //$usuario = User::create($request->validated());
        //return view('register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('auth.register');
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
