<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
                $categoria = Categorias::all();
                return $categoria;
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
                //validaciones de categorias
                $request->validate([
                        'id' => 'bail|required|unique:categorias',
                        'nombreCategoria' => 'required'
                ]);

                $categoria = new Categorias();
                $categoria->id = $request->idCategoria;
                $categoria->nombreCategoria = $request->nombreCategoria;
                $categoria->save();
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $idCategoria
         * @return \Illuminate\Http\Response
         */
        public function show($idCategoria)
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
                $categoria = Categorias::findOrFail($request->id);
                $categoria->idCategoria = $request->idCategoria;
                $categoria->nombreCategoria = $request->nombreCategoria;
                $categoria->save();
                return $categoria;
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Request $request)
        {
                $categoria = Categorias::destro($request->id);
                return $categoria;
        }
}
