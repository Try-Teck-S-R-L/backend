<?php

use App\Http\Controllers\DelegadosController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\PreinscripcionesController;
use App\Http\Controllers\RegistroLoginController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\generalController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
//Route::get('/preinscripciones', 'App\Http\Controllers\PreinscripcionesController@index');
//Route::post('/preinscripciones', 'App\Http\Controllers\PreinscripcionesController@store');
//Route::post('/preinscripcionBuscada', [PreinscripcionesController::class, 'obtenerEquipo']); //mostrar todos los registros
Route::get('/jugador', 'App\Http\Controllers\JugadorController@index'); //para tener todos los registros y mostrarlos
Route::post('/jugador', 'App\Http\Controllers\JugadorController@store'); //crear un registro
Route::put('/jugador/{id}', 'App\Http\Controllers\JugadorController@update'); //actualizar un registro
Route::delete('/jugador/{id}', 'App\Http\Controllers\JugadorController@destroy'); //borrar un registro
Route::get('/categorias', 'App\Http\Controllers\CategoriasController@index'); //para tener todos los registros y mostrarlos
Route::post('/categorias', 'App\Http\Controllers\CategoriasController@store'); //crear un registro
Route::get('/paises', 'App\Http\Controllers\paisController@index'); //para tener todos los registros y mostrarlos
Route::post('/paises', 'App\Http\Controllers\paisController@store'); //crear un registro
Route::get('/posiciones', 'App\Http\Controllers\posicionsController@index'); //para tener todos los registros y mostrarlos
Route::post('/posiciones', 'App\Http\Controllers\posicionsController@store'); //crear un registro
Route::get('/tallas', 'App\Http\Controllers\tallasController@index'); //para tener todos los registros y mostrarlos
Route::post('/tallas', 'App\Http\Controllers\tallasController@store'); //crear un registro
Route::post('/jugadores', 'App\Http\Controllers\InscripcionJugadorController@store');
Route::post('/buscarjugadores', [JugadorController::class, 'obtenerJugadoresDeUnEquipo']);
Route::post('/buscarJugador', [JugadorController::class, 'obtenerJugador']);
Route::post('/borrarJugador', [JugadorController::class, 'borrarJug']);

Route::get('/equipo', 'App\Http\Controllers\EquiposController@index');
Route::post('/equipo', 'App\Http\Controllers\EquiposController@store');
Route::put('/equipo/{id}', 'App\Http\Controllers\EquiposController@update');
Route::delete('/equipo/{id}', 'App\Http\Controllers\EquiposController@detroy');
Route::get('/preinscripciones', 'App\Http\Controllers\PreinscripcionesController@index');
Route::get('/todaspreinscripciones', 'App\Http\Controllers\PreinscripcionesController@todas');
Route::post('/preinscripciones', 'App\Http\Controllers\PreinscripcionesController@store');
Route::put('/preinscripciones/{id}', 'App\Http\Controllers\PreinscripcionesController@update'); //actualizar un registro
Route::get('/preinscripciones/{id}', 'App\Http\Controllers\PreinscripcionesController@obtenerPreinscIndiviidual');
Route::post('/preinscripcionBuscada', [PreinscripcionesController::class, 'obtenerPreinscIndividual']);
Route::post('/preinscripcionGeneral', [PreinscripcionesController::class, 'obtenerPreinscGral']);
Route::post('/aceptarpreinscripcion', [PreinscripcionesController::class, 'aceptarPreinscripcion']);
Route::post('/rechazarpreinscripcion', [PreinscripcionesController::class, 'rechazarPreinscripcion']);
Route::post('/preinscripcionesAprobadas', [PreinscripcionesController::class, 'obtenerPreinscripcionesAprobadas']);
Route::post('/preinscripcionesEditables', [PreinscripcionesController::class, 'obtenerPreinscripcionesEditables']);
Route::post('/preinscripcionesDelegado', [PreinscripcionesController::class, 'obtenerPreinscripcionesDelegado']);
Route::post('/preinscripcion_inscribir', [PreinscripcionesController::class, 'obtenerDatosPreinscripcionAprobada']);
Route::post('/borrarPreinscripcion', [PreinscripcionesController::class, 'eliminarPreinscripcion']);
Route::get('/fecha', [generalController::class, 'verificarFechaValida']);
Route::get('/fechas',  [generalController::class, 'getFechas']);





//rutas jugadores
Route::post('/jugadores', 'App\Http\Controllers\InscripcionJugadorController@store');

//rutas equipos
Route::get('/equipos', 'App\Http\Controllers\EquiposController@index'); //mostrar todos los registros
Route::post('/equipos', 'App\Http\Controllers\EquiposController@store'); //crear un registro
Route::get('/equiposTorneo', 'App\Http\Controllers\EquiposController@index'); //mostrar todos los registros
Route::put('/equipos/{id}', 'App\Http\Controllers\EquiposController@update'); //actualizar un registro
Route::delete('/equipos/{id}', 'App\Http\Controllers\EquiposController@destroy'); //destruir un registro
Route::post('/pedirequipos', [EquiposController::class, 'obtener']); //mostrar todos los registros
Route::post('/filtrarequipos', [EquiposController::class, 'filtrarLista']);
Route::post('/equipoId', [EquiposController::class, 'informacionEquipo']);




//Route::get('/prueba2', 'App\Http\Controllers\EquipoController@prueba2');
Route::get('/equipos{id}', 'App\Http\Controllers\EquiposController@index');
//rutas delegados
Route::get('/delegados', 'App\Http\Controllers\DelegadosController@index'); //mostrar todos los registros
Route::post('/delegados', 'App\Http\Controllers\DelegadosController@store'); //crear un registro
Route::put('/delegados/{id}', 'App\Http\Controllers\DelegadosController@update'); //actualizar un registro
Route::delete('/delegados/{id}', 'App\Http\Controllers\DelegadosController@destroy'); //destruir un registro
Route::post('/registrarDelegado', [RegistroController::class, 'store']);
Route::post('/loginDelegado', [loginController::class, 'store']);


//rutas administrador
Route::get('/admin', 'App\Http\Controllers\AdministradorController@index'); //mostrar todos los registros
Route::post('/admin', 'App\Http\Controllers\AdministradorController@store'); //crear un registro
Route::put('/admin/{id}', 'App\Http\Controllers\AdministradorController@update'); //actualizar un registro
Route::delete('/admin/{id}', 'App\Http\Controllers\AdministradorController@destroy'); //destruir un registro
Route::post('/delegadoInfo', [DelegadosController::class, 'obtenerInfoDelegado']);

//rutas de categorias
Route::get('/Categorias', 'App\Http\Controllers\CategoriasController@index'); //mostrar todos los registros
Route::post('/Categorias', 'App\Http\Controllers\CategoriasController@store'); //crear un registro
Route::put('/Categorias/{id}', 'App\Http\Controllers\CategoriasController@update'); //actualizar un registro
Route::delete('/Categorias/{id}', 'App\Http\Controllers\CategoriasController@destroy'); //destruir un registro



//rutas de login 

Route::post('/auth/verificar', [RegistroLoginController::class, 'verificar']);
Route::get('/auth/logout', [RegistroLoginController::class, 'logout']);
Route::get('/auth/prueba', [RegistroLoginController::class, 'prueba']);
Route::get('/auth/prueba2', [EquipoController::class, 'prueba2']);
Route::get('/categorias', 'App\Http\Controllers\CategoriasController@index'); //mostrar todos los registros
Route::post('/categorias', 'App\Http\Controllers\CategoriasController@store'); //crear un registro
Route::put('/categorias/{id}', 'App\Http\Controllers\CategoriasController@update'); //actualizar un registro
Route::delete('/categorias/{id}', 'App\Http\Controllers\CategoriasController@destroy'); //destruir un registro

/*
Route::post('/register ', [RegistroController::class, 'store']);

Route::get('/login', [LoginController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    //Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/logout', [LogoutController::class, 'logout']);
});
*/
Route::post('login', [AuthController::class, 'login']);
Route::post('signup', [AuthController::class, 'signup']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::get('me', [AuthController::class, 'me']);

Route::post('usuarioActual', [AuthController::class, 'usuarioActual']);

/*Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::post('me', 'AuthController@me');*/
