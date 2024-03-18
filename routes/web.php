<?php

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
        Route::get('/dashboard', [PacientController::class, 'index'])->name('dashboard');    //redundancia en las rutas ojo

        Route::get('/detallestamizaje/{id}', [PruebaController::class, 'detallesPrueba'])->name('tamizajedetalles'); 
        
        Route::get('/buscar',[PacientController::class, 'buscar'])->name('buscar');

});

