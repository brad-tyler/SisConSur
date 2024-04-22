<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pacient;
use App\Models\Prueba;

class PacientController extends Controller
{
   
    //
    public function index()
    {
        $pacientes = Pacient::orderBy('id', 'DESC')->paginate(10); // Obtiene los datos de la base de datos mediante el modelo
        $filtro = 'none';

        return view('dashboard', compact('pacientes', 'filtro'));
    }


    public function buscar(Request $request)
    {
        $query = $request->get('query');
        
        // Buscar registros que coincidan con el término de búsqueda en cualquier columna
        $pacientes = Pacient::where(function ($q) use ($query) {
            $q->where('NAME', 'like', "%$query%")
            ->orWhere('SURNAME', 'like', "%$query%")
            ->orWhere('DNI', 'like', "%$query%");
        })->paginate();

        $adultos = Prueba::all()->where('TIPO', 'ADULTO')->count();
        $adolecentes = Prueba::all()->where('TIPO', 'ADOLECENTE')->count();
        $gestantes = Prueba::all()->where('TIPO', 'GESTANTE')->count();
        $ninos = Prueba::all()->where('TIPO', 'INFANTE')->count();

        $filtro = 'inline';
        
        return view('dashboard', compact('pacientes','adultos','adolecentes', 'gestantes', 'ninos','filtro'));
    }

    public function create()
    {
        //
        // return view('pacientes.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $datosPaciente = $request->only(['dni', 'name', 'surname', 'sexo']); // Obtener solo los datos necesarios del formulario
        
        if(Pacient::where('dni', $request->input('dni'))->first()){
            $pacientes = Pacient::where('dni', $request->input('dni'))->paginate(1);
            // $pacientes = Pacient::all();
            $filtro = 'none';
            return view("dashboard", compact('pacientes', 'filtro', 'alerta'));
        }else{
            Pacient::create($datosPaciente); // Insertar los datos en la BD
            return redirect()->route("dashboard", compact('alerta'));
        }

    }

    // REPORTE MODAL
    public function mostrar_reporte(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $adultos = Prueba::all()->where('TIPO', 'ADULTO')->count();
        $adolecentes = Prueba::all()->where('TIPO', 'ADOLECENTE')->count();
        $gestantes = Prueba::all()->where('TIPO', 'GESTANTE')->count();
        $ninos = Prueba::all()->where('TIPO', 'INFANTE')->count();
        $filtro = 'none';

        return view('reporte', compact('adultos','adolecentes', 'gestantes', 'ninos','filtro'));
    }

    


}
