<?php

use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroLoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register ', function () {
    return view('register');
});
Route::post('/register ',[RegistroController::class, 'store']);

Route::get('/login ', function () {
    return view('login');
});
Route::post('/login',[loginController::class, 'store']);
/*
Route::post('/auth/verificar', [RegistroLoginController::class, 'verificar']);
Route::get('/auth/logout', [RegistroLoginController::class, 'logout']);
Route::post('/auth/prueba', [RegistroLoginController::class, 'prueba']);
*/
