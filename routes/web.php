<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\TamizajeController;
use App\Http\Controllers\Controller;
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
    Route::get('/dashboard', [PacientController::class, 'index'])->name('dashboard');    //redundancia en las rutas ojo


    Route::get('/reporte', [PruebaController::class, 'reporte_tipo_tamizaje'])->name('reporte')->middleware('role:usuario');
    

    Route::get('/doctores', [Controller::class, 'listadoctores'])->name('doctores')->middleware('role:admin');

    // Route::get('/admin/dashboard', [YourController::class, 'dashboard'])->middleware('role:admin,user');


    //Route::get('/reporte-prueba', [PruebaController::class, 'reporte_tipo_tamizaje'])->name('reporte-prueba'); 

    Route::get('/detallestamizaje/{id}', [PruebaController::class, 'detallesPrueba'])->name('tamizajedetalles')->middleware('role:usuario,admin');

    Route::get('/buscar', [PacientController::class, 'buscar'])->name('buscar')->middleware('role:usuario,admin');

    Route::get('/pacientes-create', [PacientController::class, 'create'])->name('pacientes.create')->middleware('role:usuario,admin'); // INSERTAR PACIENTE
    Route::post('/pacientes-store', [PacientController::class, 'store'])->name('pacientes.store')->middleware('role:admin,usuario'); // INSERTAR PACIENTE

    //insertar prueba
    Route::post('/registrar-prueba/{id}', [PruebaController::class, 'insertar'])->name('registrarprueba')->middleware('role:admin,usuario');

    Route::post('/registrar-doctor', [Controller::class, 'registrardoctor'])->name('registrardoctor')->middleware('role:admin');

    Route::get('/admin.index', [AdminController::class, 'index'])->name('admin.index')->middleware('role:admin');

    Route::get('cambiar-estado/{id}', [Controller::class, 'cambiarEstado'])->name('cambiar_estado')->middleware('role:admin');

    Route::put('/editarprueba/{id}', [PruebaController::class, 'update'])->name('actualizarprueba')->middleware('role:admin');
});
