<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Prueba;
use Livewire\Component;

class PruebaController extends Controller
{
    //
    public function index()
    {
        $pruebas = Prueba::orderBy('id', 'DESC')->paginate(); // Obtiene los datos de la base de datos mediante el modelo
        return view('dashboard', compact('pruebas'));
    }
}
