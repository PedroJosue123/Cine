<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Pelicula;
use App\Models\Entradas;
use App\Models\Sala;
use App\Models\Cliente;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homeadmin', [App\Http\Controllers\HomeController::class, 'indexadmin'])->name('homeadmin');
Route::get('/peliculas', [App\Http\Controllers\PeliculaController::class, 'index'])->name('peliculas');
Route::post('/subirPelicula', [App\Http\Controllers\PeliculaController::class,'subirPelicula'])->name('subirPelicula');
Route::get('/pelicula/{ruta}',[App\Http\Controllers\PeliculaController::class,'mostrarPelicula']);
Route::post('/eliminarPelicula', [App\Http\Controllers\PeliculaController::class, 'eliminarPelicula'])->name('eliminarPelicula');
Route::get('/peliculas/{id}', [App\Http\Controllers\PeliculaController::class,'pagina']);

Route::get('/salas', [App\Http\Controllers\PeliculaController::class, 'index2'])->name('salas');
Route::post('/subirSala', [App\Http\Controllers\PeliculaController::class,'subirSala'])->name('subirSala');
Route::post('/eliminarSala', [App\Http\Controllers\PeliculaController::class, 'eliminarSala'])->name('eliminarSala');

Route::get('/horarios', [App\Http\Controllers\PeliculaController::class, 'index3'])->name('horarios');
Route::post('/subirHorario', [App\Http\Controllers\PeliculaController::class,'subirHorario'])->name('subirHorario');
Route::post('/eliminarHorario', [App\Http\Controllers\PeliculaController::class, 'eliminarHorario'])->name('eliminarHorario');

Route::get('/payments/{id}', [App\Http\Controllers\PaymentController::class,'irPagar']);
Route::get('/payments/{id}/{cliente_id}', [App\Http\Controllers\PaymentController::class, 'mostrarPagoCliente'])->name('mostrarPagoCliente');
Route::post('/subirEntrada/{id}/{id_cliente}', [App\Http\Controllers\PaymentController::class,'subirEntrada'])->name('subirEntrada');

Route::get('/clientes/{id}', [App\Http\Controllers\PaymentController::class,'irCLientes']);
Route::post('/subirCliente/{id}', [App\Http\Controllers\PaymentController::class,'subirCliente'])->name('subirCliente');

Route::get('enviarAPI',[App\Http\Controllers\PeliculaController::class,'enviarAPI'])->name('enviarAPI');
Route::get('peliculaTaquillera',[App\Http\Controllers\PeliculaController::class,'peliculaTaquillera'])->name('peliculaTaquillera');

Route::get('/entradas', [App\Http\Controllers\PeliculaController::class, 'index4'])->name('entradas');
