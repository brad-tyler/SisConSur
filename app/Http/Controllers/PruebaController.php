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
use Spatie\Permission\Models\Role;

class PruebaController extends Controller
{

    //
    public function index()
    {
        $pruebas = Prueba::orderBy('id', 'DESC')->paginate(); // Obtiene los datos de la base de datos mediante el modelo
        $roles = Role::all();
        return view('dashboard', compact('pruebas', 'roles'));
    }


    public function insertar(Request $formulario, string $id)
    {
        // comprobar cuantos tamizajes tiene el usuario

        //buscar al paciente y las primeras pruebas

        //$fecha = Carbon::parse($registro->created_at)

        //$tamizajes_totales = Prueba::where('pacient_id','=',$id)->get();

        $nueva_prueba = new Prueba;
        $nueva_prueba->pacient()->associate(Pacient::where('id', '=', $id)->first());
        $nueva_prueba->tamizaje()->associate(Tamizaje::where('id', '=', $formulario->input('tamizaje'))->first());
        $nueva_prueba->user()->associate(User::where('id', '=', Auth::user()->id)->first());
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



        return response()->json(['paciente' => $a, 'doctor' => $b, 'fecha' => $dia . '-' . $mes . '-' . $year, 'estado' => $registro->ESTADO]);
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

        $tipo3 = Prueba::all()->where('tamizaje_id', '3')->count();
        $nombre_3 = Tamizaje::find(3);
        $tipo3NAME = $nombre_3->NAME;

        $tipo4 = Prueba::all()->where('tamizaje_id', '4')->count();
        $nombre_4 = Tamizaje::find(4);
        $tipo4NAME = $nombre_4->NAME;

        $tipo5 = Prueba::all()->where('tamizaje_id', '5')->count();
        $nombre_5 = Tamizaje::find(5);
        $tipo5NAME = $nombre_5->NAME;

        $tipo6 = Prueba::all()->where('tamizaje_id', '6')->count();
        $nombre_6 = Tamizaje::find(6);
        $tipo6NAME = $nombre_6->NAME;

        $tipo7 = Prueba::all()->where('tamizaje_id', '7')->count();
        $nombre_7 = Tamizaje::find(7);
        $tipo7NAME = $nombre_7->NAME;

        // Validar los datos del formulario si es necesario
        $adultos = Pacient::all()->where('TIPO', 'ADULTO')->count();
        $adolecentes = Pacient::all()->where('TIPO', 'ADOLECENTE')->count();
        $gestantes = Pacient::all()->where('TIPO', 'GESTANTE')->count();
        $ninos = Pacient::all()->where('TIPO', 'INFANTE')->count();
        $filtro = 'none';

        return view('reporte', compact(  'tipo1','tipo1NAME', 
                                                'tipo2','tipo2NAME',
                                                'tipo3','tipo3NAME',
                                                'tipo4','tipo4NAME',
                                                'tipo5','tipo5NAME',
                                                'tipo6','tipo6NAME',
                                                'tipo7','tipo7NAME',
                                                'adultos','adolecentes', 'gestantes', 'ninos','filtro'
                                            ));
    }

    public function update(Request $request, $id)
    {
    // Validar los datos del formulario
    $request->validate([
        'tamizaje_id' => 'required',
        'estado' => 'required',
        'lugar' => 'required',
    ]);

    // Actualizar los datos de la prueba
    $prueba = Prueba::findOrFail($id);
    $prueba->tamizaje_id = $request->input('tamizaje_id');
    $prueba->ESTADO = $request->input('estado');
    $prueba->LUGAR = $request->input('lugar');
    
    $prueba->save();

    // Redirigir o responder según sea necesario
    return redirect()->back()->with('success', 'Prueba actualizada correctamente.');
    }

    
}
