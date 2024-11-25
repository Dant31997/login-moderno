<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PeticionesController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\PeticionController;
use App\Http\Controllers\DashboardControllerController;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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

Route::get('/', function () {
    return view('welcome');
});

// Autenticación y registro de usuarios
Auth::routes();

// Ruta para el dashboard accesible después del login para todos los roles
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');

// Rutas para las secciones "usuarios", "metas" y "pqr"
Route::resource('usuarios', UsuariosController::class)->middleware(['auth', 'role:admin']); 
Route::get('/metas.index', [HomeController::class, 'metas'])->name('metas')->middleware('auth');
Route::get('/pqr', [HomeController::class, 'pqr'])->name('pqr')->middleware('auth');
Route::get('/pqr-register', [PeticionesController::class, 'registrarPQR'])->name('pqr.registrar');
Route::resource('metas', MetaController::class);
Route::resource('peticiones', PeticionesController::class);


Route::get('/dashboard', [DashboardController::class, 'contenidoDash'])->middleware('auth');