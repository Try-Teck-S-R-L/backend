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


Route::get('/preinscripciones', 'App\Http\Controllers\PreinscripcionController@index');
Route::post('/preinscripciones', 'App\Http\Controllers\PreinscripcionController@store');
Route::get('/jugador', 'App\Http\Controllers\jugadorController@index'); //para tener todos los registros y mostrarlos
Route::post('/jugador', 'App\Http\Controllers\jugadorController@store'); //crear un registro
Route::put('/jugador/{id}', 'App\Http\Controllers\jugadorController@update'); //actualizar un registro
Route::delete('/jugador', 'App\Http\Controllers\jugadorController@destroy'); //borrar un registro
Route::get('/jugadores', 'App\Http\Controllers\InscripcionjugadorController@index');
Route::post('/jugadores', 'App\Http\Controllers\InscripcionjugadorController@store');
