<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pacient;

class PacientController extends Controller
{
    //
    public function index()
    {
        $pacientes = Pacient::orderBy('id', 'DESC')->paginate(); // Obtiene los datos de la base de datos mediante el modelo
        $adultos = Pacient::all()->where('TIPO', 'ADULTO')->count();
        $adolecentes = Pacient::all()->where('TIPO', 'ADOLECENTE')->count();
        $gestantes = Pacient::all()->where('TIPO', 'GESTANTE')->count();
        $ninos = Pacient::all()->where('TIPO', 'INFANTE')->count();
        $filtro = 'none';

        return view('dashboard', compact('pacientes','adultos','adolecentes', 'gestantes', 'ninos','filtro'));
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

}
