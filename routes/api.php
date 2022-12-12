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
use App\Http\Controllers\solicitud_delegado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//header('Access-Control-Allow-Origin: *');
/*header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers:*");*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/jugador', 'App\Http\Controllers\JugadorController@index'); //para tener todos los registros y mostrarlos
Route::post('/jugador', 'App\Http\Controllers\JugadorController@store'); //crear un registro
Route::put('/jugador/{id}', 'App\Http\Controllers\JugadorController@update'); //actualizar un registro
Route::delete('/jugador/{id}', 'App\Http\Controllers\JugadorController@destroy'); //borrar un registro
Route::get('/categorias', 'App\Http\Controllers\CategoriasController@index'); //para tener todos los registros y mostrarlos
Route::post('/categorias', 'App\Http\Controllers\CategoriasController@store'); //crear un registro
Route::get('/paises', 'App\Http\Controllers\paisController@index'); //para tener todos los registros y mostrarlos
Route::post('/paises', 'App\Http\Controllers\paisController@store'); //crear un registro
Route::post('/jugadores', 'App\Http\Controllers\InscripcionJugadorController@store');
Route::post('/buscarjugadores', [JugadorController::class, 'obtenerJugadoresDeUnEquipo']);
Route::get('/jugadoresTorneo', [JugadorController::class, 'obtenerJugadoresDelTorneo']);
Route::post('/buscarJugador', [JugadorController::class, 'obtenerJugador']);
Route::post('/borrarJugador', [JugadorController::class, 'borrarJug']);

Route::get('/equipo', 'App\Http\Controllers\EquiposController@index');
Route::post('/equipo', 'App\Http\Controllers\EquiposController@store');
Route::put('/equipo/{id}', 'App\Http\Controllers\EquiposController@update');
Route::delete('/equipo/{id}', 'App\Http\Controllers\EquiposController@detroy');


// PREINSCRIPCION
Route::get('/todaspreinscripciones', [PreinscripcionesController::class, 'todasPreinscripcionesTorneo']);
Route::get('/preinscripciones/{id}', [PreinscripcionesController::class, 'obtenerPreinscIndividual']);
Route::post('/preinscripcionBuscada', [PreinscripcionesController::class, 'obtenerPreinscGral']);
Route::post('/preinscripcionGeneral', [PreinscripcionesController::class, 'obtenerPreinscGral']);
Route::post('/preinscripcion_inscribir', [PreinscripcionesController::class, 'obtenerDatosPreinscripcionAprobada']);
Route::post('/preinscripcionesAprobadas', [PreinscripcionesController::class, 'obtenerPreinscripcionesAprobadas']);
Route::post('/preinscripcionesEditables', [PreinscripcionesController::class, 'obtenerPreinscripcionesEditables']);
Route::post('/preinscripcionesDelegado', [PreinscripcionesController::class, 'obtenerPreinscripcionesDelegado']);
Route::post('/aceptarpreinscripcion', [PreinscripcionesController::class, 'aceptarPreinscripcion']);
Route::post('/rechazarpreinscripcion', [PreinscripcionesController::class, 'rechazarPreinscripcion']);
Route::post('/borrarPreinscripcion', [PreinscripcionesController::class, 'eliminarPreinscripcion']);
Route::get('/preinscripciones', [PreinscripcionesController::class, 'index']);
Route::post('/preinscripciones', [PreinscripcionesController::class, 'store']);
Route::post('/editarPreinscripcion', [PreinscripcionesController::class, 'update']);

Route::get('image/{path}', [generalController::class, 'getImage'])->where('path', '.*');
Route::post('image', [generalController::class, 'uploadImage']);


//FECHA
Route::get('/fecha', [generalController::class, 'verificarFechaValida']);
Route::get('/fechas',  [generalController::class, 'getFechas']);





//rutas jugadores
Route::post('/jugadores', 'App\Http\Controllers\InscripcionJugadorController@store');


//EQUIPOS
Route::post('/equipos', [EquiposController::class, 'store']); //crear un registro
Route::get('/equiposTorneo', [EquiposController::class, 'index']); //mostrar todos los registros
Route::post('/pedirequipos', [EquiposController::class, 'obtener']); //mostrar todos los registros
Route::post('/filtrarequipos', [EquiposController::class, 'equiposDelegado']);
Route::post('/equipoId', [EquiposController::class, 'informacionEquipo']);




Route::get('/delegados', 'App\Http\Controllers\DelegadosController@index'); //mostrar todos los registros
Route::post('/delegados', 'App\Http\Controllers\DelegadosController@store'); //crear un registro
Route::put('/delegados/{id}', 'App\Http\Controllers\DelegadosController@update'); //actualizar un registro
Route::delete('/delegados/{id}', 'App\Http\Controllers\DelegadosController@destroy'); //destruir un registro
Route::post('/registrarDelegado', [RegistroController::class, 'store']);
Route::post('/loginDelegado', [loginController::class, 'store']);


//Solicitudes_del

Route::post('/crearsolicitud', [solicitud_delegado::class, 'store']);
Route::post('/aprobarsolicitud', [solicitud_delegado::class, 'aceptarDelegado']);
Route::post('/rechazarsolicitud', [solicitud_delegado::class, 'rechazarDelegado']);
Route::post('/crearsolicitud', [solicitud_delegado::class, 'store']);
Route::post('/obtenertodassolicitudes', [solicitud_delegado::class, 'index']);
Route::get('/solicitudesespera', [solicitud_delegado::class, 'solicitudesEnEspera']);
Route::post('/infosolicitud', [solicitud_delegado::class, 'obtenerInfoSolicitud']);


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






Route::post('login', [AuthController::class, 'login']);
Route::post('signup', [AuthController::class, 'signup']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('actualizarRol', [AuthController::class, 'actualizarRol']);
Route::get('me', [AuthController::class, 'me']);


Route::post('usuarioActual', [AuthController::class, 'usuarioActual']);
