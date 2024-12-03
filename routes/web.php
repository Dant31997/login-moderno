<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    DashboardController,
    UsuariosController,
    PeticionesController,
    MetaController,
    ConsultaController
};
use Illuminate\Support\Facades\Auth;

// Página principal
Route::get('/', function () {
    return view('welcome');
});

// Autenticación
Auth::routes();

// Dashboard (única definición)
Route::get('/dashboard', [DashboardController::class, 'contenidoDash'])->name('dashboard')->middleware('auth');

// Recursos protegidos por autenticación y roles
Route::resource('usuarios', UsuariosController::class)->middleware(['auth', 'role:admin']);
Route::resource('metas', MetaController::class)->middleware('auth');
Route::put('metas/{meta}/evidencia', [MetaController::class, 'submitEvidence'])->name('metas.submitEvidence')->middleware('role:employee');

Route::resource('peticiones', PeticionesController::class)->middleware('auth');

// Consulta de PQRS
Route::get('/consultapqr', [ConsultaController::class, 'index'])->name('consultapqr');
Route::post('/consultapqr', [ConsultaController::class, 'show'])->name('consulta.show');
Route::post('/check-id', [ConsultaController::class, 'checkId'])->name('checkId');

// Ruta adicional para registrar PQRS (si es necesario)
Route::get('/pqr-register', [PeticionesController::class, 'registrarPQR'])->name('pqr.registrar');
