<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pacient;

class PacientController extends Controller
{
    //
    public function index()
    {
        $pacientes = Pacient::orderBy('id', 'DESC')->paginate(10); // Obtiene los datos de la base de datos mediante el modelo
        $filtro = 'none';

        return view('dashboard', compact('pacientes','filtro'));
    }


    public function buscar(Request $request)
    {
        $query = $request->get('query');
        
        // Buscar registros que coincidan con el término de búsqueda en cualquier columna
        $pacientes = Pacient::where(function ($q) use ($query) {
            $q->where('NAME', 'like', "%$query%")
            ->orWhere('DNI', 'like', "%$query%")
            ->orWhere('TIPO', 'like', "%$query%");
        })->paginate();

        $adultos = Pacient::all()->where('TIPO', 'ADULTO')->count();
        $adolecentes = Pacient::all()->where('TIPO', 'ADOLECENTE')->count();
        $gestantes = Pacient::all()->where('TIPO', 'GESTANTE')->count();
        $ninos = Pacient::all()->where('TIPO', 'INFANTE')->count();

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

        $datosPaciente = $request->only(['dni', 'name', 'surname', 'edad', 'tipo', 'sexo']); // Obtener solo los datos necesarios del formulario
        Pacient::create($datosPaciente); // Insertar los datos en la BD
        return redirect()->route("dashboard");

    }

    // REPORTE MODAL
    public function mostrar_reporte(Request $request)
    {
        // Validar los datos del formulario si es necesario

        
        $adultos = Pacient::all()->where('TIPO', 'ADULTO')->count();
        $adolecentes = Pacient::all()->where('TIPO', 'ADOLECENTE')->count();
        $gestantes = Pacient::all()->where('TIPO', 'GESTANTE')->count();
        $ninos = Pacient::all()->where('TIPO', 'INFANTE')->count();
        $filtro = 'none';

        return view('reporte', compact('adultos','adolecentes', 'gestantes', 'ninos','filtro'));
    }


}
