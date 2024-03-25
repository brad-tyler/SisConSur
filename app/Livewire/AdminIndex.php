<?php

namespace App\Livewire;

use App\Models\Pacient;
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
        $usercount = User::all();//->count();       //para obtener los usuarios
        // SELECT user_id, COUNT(*) AS cantidad_total
        // FROM pruebas
        // GROUP BY user_id;
        $usersPruebasCount = DB::table('pruebas')
            ->select('user_id', DB::raw('COUNT(*) as cantidad_total'))
            ->groupBy('user_id')
            ->get();
        
        $userNames = User::whereIn('id', $usersPruebasCount->pluck('user_id'))->pluck('name', 'id');

        $userLabels = [];
        $userCounts = [];

        foreach ($usersPruebasCount as $userPruebasCount) {
            $userLabels[] = $userNames[$userPruebasCount->user_id];
            $userCounts[] = $userPruebasCount->cantidad_total;
        }

        return view('livewire.admin-index', compact('pacientes','adultos','adolecentes', 'gestantes', 'ninos','filtro', 'usuarios', 'userLabels', 'userCounts'));
    }
    // laravel-liveware-tables      paquete para datatables
}
