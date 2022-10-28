<?php

use App\Http\Controllers\RegistroLoginController;
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
Route::get('/jugador', 'App\Http\Controllers\jugadorController@index'); //para tener todos los registros y mostrarlos
Route::post('/jugador', 'App\Http\Controllers\jugadorController@store'); //crear un registro
Route::put('/jugador/{id}', 'App\Http\Controllers\jugadorController@update'); //actualizar un registro
Route::delete('/jugador/{id}', 'App\Http\Controllers\jugadorController@destroy'); //borrar un registro
Route::get('/categorias', 'App\Http\Controllers\CategoriasController@index'); //para tener todos los registros y mostrarlos
Route::post('/categorias', 'App\Http\Controllers\CategoriasController@store'); //crear un registro
Route::get('/paises', 'App\Http\Controllers\paisController@index'); //para tener todos los registros y mostrarlos
Route::post('/paises', 'App\Http\Controllers\paisController@store'); //crear un registro
Route::get('/posiciones', 'App\Http\Controllers\posicionsController@index'); //para tener todos los registros y mostrarlos
Route::post('/posiciones', 'App\Http\Controllers\posicionsController@store'); //crear un registro
Route::get('/tallas', 'App\Http\Controllers\tallasController@index'); //para tener todos los registros y mostrarlos
Route::post('/tallas', 'App\Http\Controllers\tallasController@store'); //crear un registro
Route::post('/jugadores', 'App\Http\Controllers\InscripcionJugadorController@store');

Route::get('/equipo', 'App\Http\Controllers\EquipoController@index');
Route::post('/equipo', 'App\Http\Controllers\EquipoController@store');
Route::put('/equipo/{id}', 'App\Http\Controllers\EquipoController@update');
Route::delete('/equipo/{id}', 'App\Http\Controllers\EquipoController@detroy');

//rutas jugadores
Route::post('/jugadores', 'App\Http\Controllers\InscripcionJugadorController@store');

//rutas equipos
Route::get('/equipos', 'App\Http\Controllers\EquipoController@index'); //mostrar todos los registros
Route::post('/equipos', 'App\Http\Controllers\EquipoController@store'); //crear un registro
Route::put('/equipos/{id}', 'App\Http\Controllers\EquipoController@update'); //actualizar un registro
Route::delete('/equipos/{id}', 'App\Http\Controllers\EquipoController@destroy'); //destruir un registro



//rutas delegados
Route::get('/delegado', 'App\Http\Controllers\DelegadoController@index'); //mostrar todos los registros
Route::post('/delegado', 'App\Http\Controllers\DelegadoController@store'); //crear un registro
Route::put('/delegado/{id}', 'App\Http\Controllers\DelegadoController@update'); //actualizar un registro
Route::delete('/delegado/{id}', 'App\Http\Controllers\DelegadoController@destroy'); //destruir un registro

//rutas administrador
Route::get('/admin', 'App\Http\Controllers\AdministradorController@index'); //mostrar todos los registros
Route::post('/admin', 'App\Http\Controllers\AdministradorController@store'); //crear un registro
Route::put('/admin/{id}', 'App\Http\Controllers\AdministradorController@update'); //actualizar un registro
Route::delete('/admin/{id}', 'App\Http\Controllers\AdministradorController@destroy'); //destruir un registro

//rutas de categorias
Route::get('/categoria', 'App\Http\Controllers\CategoriaController@index'); //mostrar todos los registros
Route::post('/categoria', 'App\Http\Controllers\CategoriaController@store'); //crear un registro
Route::put('/categoria/{id}', 'App\Http\Controllers\CategoriaController@update'); //actualizar un registro
Route::delete('/categoria/{id}', 'App\Http\Controllers\CategoriaController@destroy'); //destruir un registro


//rutas de login 

Route::post('/auth/verificar', [RegistroLoginController::class, 'verificar']);
Route::get('/auth/logout', [RegistroLoginController::class, 'logout']);
Route::post('/auth/prueba', [RegistroLoginController::class, 'prueba']);
