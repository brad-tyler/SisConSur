<?php

namespace App\Http\Controllers;

use \App\Models\Prueba;
use Illuminate\Http\Request;
use \App\Models\Tamizaje;

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

    public function reporte_tipo_tamizaje(Request $request)
    {
        // Validar los datos del formulario si es necesario

        
        $tipo1 = Prueba::all()->where('tamizaje_id', '1')->count();
        $nombre_1 = Tamizaje::find(1);
        $tipo1NAME = $nombre_1->NAME;
        
        $tipo2 = Prueba::all()->where('tamizaje_id', '2')->count();
        $nombre_2 = Tamizaje::find(2);
        $tipo2NAME = $nombre_2->NAME;
        return view('reporte-prueba', compact('tipo1','tipo1NAME', 'tipo2','tipo2NAME'));
    }
}
