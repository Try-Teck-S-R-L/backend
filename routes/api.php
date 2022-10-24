<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas preincripciones
Route::get('/preinscripciones', 'App\Http\Controllers\PreinscripcionController@index');
Route::post('/preinscripciones', 'App\Http\Controllers\PreinscripcionController@store');

//rutas jugadores
Route::post('/jugadores', 'App\Http\Controllers\InscripcionJugadorController@store');

//rutas equipos
Route::get('/equipos', 'App\Http\Controllers\InscripcionEquipoController@index');


//rutas delegados
Route::get('/delegado', 'App\Http\Controllers\DelegadoController@index'); //mostrar todos los registros
Route::post('/delegado', 'App\Http\Controllers\DelegadoController@store'); //crear un registro
Route::put('/delegado/{id}', 'App\Http\Controllers\DelegadoController@update'); //actualizar un registro
Route::delete('/delegado/{id}', 'App\Http\Controllers\DelegadoController@destroy'); //destruir un registro