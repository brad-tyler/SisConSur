<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\TamizajeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');               
    // })->name('dashboard');
    Route::redirect('/', 'dashboard');
    Route::get('/dashboard', [PacientController::class, 'index'])->name('dashboard');   

    Route::get('/reporte', [PacientController::class, 'mostrar_reporte'])->name('reporte');    

    Route::get('/reporte-prueba', [PruebaController::class, 'reporte_tipo_tamizaje'])->name('reporte-prueba'); 

    Route::get('/detallestamizaje/{id}', [PruebaController::class, 'detallesPrueba'])->name('tamizajedetalles');

    Route::get('/buscar', [PacientController::class, 'buscar'])->name('buscar');

    Route::get('/pacientes-create', [PacientController::class, 'create'])->name('pacientes.create'); // INSERTAR PACIENTE
    Route::post('/pacientes-store', [PacientController::class, 'store'])->name('pacientes.store'); // INSERTAR PACIENTE

    //insertar prueba
    Route::post('/registrar-prueba/{id}',[PruebaController::class,'insertar'])->name('registrarprueba');
    
    Route::get('/admin.index', [AdminController::class, 'index'])->name('admin.index');

    Route::put('/actualizar-prueba/{id}', [PruebaController::class, 'update'])->name('actualizarprueba');

    
});
