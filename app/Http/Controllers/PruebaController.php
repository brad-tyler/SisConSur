<?php

namespace App\Http\Controllers;

use \App\Models\Prueba;

class PruebaController extends Controller
{
    //
    public function index()
    {
        $pruebas = Prueba::orderBy('id', 'DESC')->paginate(); // Obtiene los datos de la base de datos mediante el modelo
        return view('dashboard', compact('pruebas'));
    }
}
