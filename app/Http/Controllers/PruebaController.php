<?php

namespace App\Http\Controllers;
//obtener al colega que inicio sesion
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use \App\Models\Tamizaje;
use \App\Models\Pacient;
use \App\Models\Prueba;
use \App\Models\User;

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


    public function insertar(Request $formulario, string $id)
    {
        // comprobar cuantos tamizajes tiene el usuario

        //buscar al paciente y las primeras pruebas

        //$fecha = Carbon::parse($registro->created_at)

        //$tamizajes_totales = Prueba::where('pacient_id','=',$id)->get();

        $nueva_prueba = new Prueba;
        $nueva_prueba->pacient()->associate(Pacient::where('id','=',$id)->first());
        $nueva_prueba->tamizaje()->associate(Tamizaje::where('id','=',$formulario->input('tamizaje'))->first());
        $nueva_prueba->user()->associate(User::where('id','=', Auth::user()->id )->first());
        $nueva_prueba->ESTADO =  $formulario->input('estado');
        $nueva_prueba->LUGAR = $formulario->input('lugar');
        
        $now = Carbon::now();
        $nueva_prueba->created_at = $now;
        $nueva_prueba->updated_at = $now;

        $nueva_prueba->save();

        return redirect()->back();
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
