<?php

namespace App\Http\Controllers;

use \App\Models\Prueba;

//para las fechas
use Carbon\Carbon;



class PruebaController extends Controller
{
    //
    public function index()
    {
        $pruebas = Prueba::orderBy('id', 'DESC')->paginate(); // Obtiene los datos de la base de datos mediante el modelo
        return view('dashboard', compact('pruebas'));
    }


    public function detallesPrueba($id)
    {
        $registro = Prueba::find($id);

        $a = $registro->pacient->NAME;

        $b = $registro->user->name;

        $fecha = Carbon::parse($registro->created_at);
        $fecha_formato = $fecha->toDateString();
        
        $year = $fecha->format('y');
        $mes = $fecha->format('m');
        $dia = $fecha->format('d');



        return response()->json(['paciente'=>$a , 'doctor'=>$b , 'fecha'=>$dia.'-'.$mes.'-'.$year , 'estado'=>$registro->ESTADO]);
    }
}
