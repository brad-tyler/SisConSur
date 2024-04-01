<?php

namespace App\Livewire;

use App\Models\Pacient;
use App\Models\Prueba;
use App\Models\Tamizaje;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminIndex extends Component
{
    public function render()
    {
        $pacientes = Pacient::orderBy('id', 'DESC')->paginate(); // Obtiene los datos de la base de datos mediante el modelo
        $adultos = Pacient::all()->where('TIPO', 'ADULTO')->count();
        $adolecentes = Pacient::all()->where('TIPO', 'ADOLECENTE')->count();
        $gestantes = Pacient::all()->where('TIPO', 'GESTANTE')->count();
        $ninos = Pacient::all()->where('TIPO', 'INFANTE')->count();
        $filtro = 'none';
        $usuarios = User::orderBy('id', 'DESC')->paginate();
        $usercount = User::all(); //->count();       //para obtener los usuarios

        $tamizajes = Tamizaje::all();

        $tamizajeLabels = [];
        $estado1Counts = [];
        $estado2Counts = [];

        foreach ($tamizajes as $tamizaje) {
            $tamizajeLabels[] = $tamizaje->NAME; // Ajustar la propiedad de nombre del tamizaje
            // positivos
            $positivos = Prueba::where('tamizaje_id', $tamizaje->id)
                ->where('estado', '1')
                ->count();
            $estado1Counts[] = $positivos;
        
            // negativos
            $negativos = Prueba::where('tamizaje_id', $tamizaje->id)
                ->where('estado', '0')
                ->count();
            $estado2Counts[] = $negativos;
        }

        return view('livewire.admin-index', compact('pacientes', 'adultos', 'adolecentes', 'gestantes', 'ninos', 'filtro', 'usuarios', 'tamizajeLabels', 'estado1Counts', 'estado2Counts'));
    }
    // laravel-liveware-tables      paquete para datatables
}
