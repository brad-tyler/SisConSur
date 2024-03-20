<?php

namespace App\Livewire;

use App\Models\Pacient;
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

        return view('livewire.admin-index', compact('pacientes','adultos','adolecentes', 'gestantes', 'ninos','filtro'));
    }
}
