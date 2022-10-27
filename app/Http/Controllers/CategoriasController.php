<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
<<<<<<<< HEAD:app/Http/Controllers/CategoriaController.php

class CategoriaController extends Controller
========
use App\Models\Categorias;

class CategoriasController extends Controller
>>>>>>>> sprint2back:app/Http/Controllers/CategoriasController.php
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<<< HEAD:app/Http/Controllers/CategoriaController.php
        $categoria = Categoria::all();
        return $categoria;
========
        $categorias = Categorias::all(); //trae todos los registros
        return $categorias;
>>>>>>>> sprint2back:app/Http/Controllers/CategoriasController.php
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
<<<<<<<< HEAD:app/Http/Controllers/CategoriaController.php
        $categoria = new Categoria();
        $categoria->nombreCategoria = $request->nombreCategoria;
        $categoria->save();
========
        $categorias = new Categorias();
        $categorias->nombreValor = $request->nombreValor;

        $categorias->save();
>>>>>>>> sprint2back:app/Http/Controllers/CategoriasController.php
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
<<<<<<<< HEAD:app/Http/Controllers/CategoriaController.php
        $categoria = Categoria::findOrFail($request->id);
        $categoria->nombreCategoria = $request->nombreCategoria;
        $categoria->save();
        return $categoria;
========
        $categorias = Categorias::findOrFail($request->id);
        $categorias->nombreValor = $request->nombreValor;

        $categorias->save();

        return $categorias;
>>>>>>>> sprint2back:app/Http/Controllers/CategoriasController.php
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
<<<<<<<< HEAD:app/Http/Controllers/CategoriaController.php
        $categoria = Categoria::destro($request->id);
        return $categoria;
========
        $categorias = Categorias::destroy($id);

        return $categorias;
>>>>>>>> sprint2back:app/Http/Controllers/CategoriasController.php
    }
}
