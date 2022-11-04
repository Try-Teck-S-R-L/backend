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
Route::get('/preinscripciones', 'App\Http\Controllers\preinscripcionesController@index');
Route::post('/preinscripciones', 'App\Http\Controllers\preinscripcionesController@store');
Route::put('/preinscripciones/{id}', 'App\Http\Controllers\preinscripcionesController@update'); //actualizar un registro
Route::delete('/preinscripciones/{id}', 'App\Http\Controllers\preinscripcionesController@destroy'); //eliminar un registro

//rutas jugadores
Route::post('/jugadores', 'App\Http\Controllers\InscripcionJugadorController@store');

//rutas equipos
Route::get('/equipos', 'App\Http\Controllers\equiposController@index'); //mostrar todos los registros
Route::post('/equipos', 'App\Http\Controllers\equiposController@store'); //crear un registro
Route::put('/equipos/{id}', 'App\Http\Controllers\equiposController@update'); //actualizar un registro
Route::delete('/equipos/{id}', 'App\Http\Controllers\equiposController@destroy'); //destruir un registro



//rutas delegados
Route::get('/delegados', 'App\Http\Controllers\DelegadosController@index'); //mostrar todos los registros
Route::post('/delegados', 'App\Http\Controllers\DelegadosController@store'); //crear un registro
Route::put('/delegados/{id}', 'App\Http\Controllers\DelegadosController@update'); //actualizar un registro
Route::delete('/delegados/{id}', 'App\Http\Controllers\DelegadosController@destroy'); //destruir un registro

//rutas administrador
Route::get('/admin', 'App\Http\Controllers\AdministradorController@index'); //mostrar todos los registros
Route::post('/admin', 'App\Http\Controllers\AdministradorController@store'); //crear un registro
Route::put('/admin/{id}', 'App\Http\Controllers\AdministradorController@update'); //actualizar un registro
Route::delete('/admin/{id}', 'App\Http\Controllers\AdministradorController@destroy'); //destruir un registro

//rutas de categorias
Route::get('/categorias', 'App\Http\Controllers\CategoriasController@index'); //mostrar todos los registros
Route::post('/categorias', 'App\Http\Controllers\CategoriasController@store'); //crear un registro
Route::put('/categorias/{id}', 'App\Http\Controllers\CategoriasController@update'); //actualizar un registro
Route::delete('/categorias/{id}', 'App\Http\Controllers\CategoriasController@destroy'); //destruir un registro