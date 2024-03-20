<?php

namespace App\Livewire;

use App\Models\Prueba;
use App\Models\User;
use Livewire\Component;

class ModalDetalles extends Component
{
    public $prueba;
    public $open = false;

    public function mount(Prueba $prueba)
    {
        $this->prueba = $prueba;
    }

    public function render()
    {
        $detalle = Prueba::find($this->prueba->id); // Usamos $this->prueba para obtener el ID de la prueba
        $user = User::all();
        return view('livewire.modal-detalles', compact('detalle', 'user'));
    }

    // public function render($id)
    // {
    //     $registro = Prueba::find($id);

    //     $a = $registro->pacient->NAME;

    //     $b = $registro->user->name;

    //     $fecha = Carbon::parse($registro->created_at);
    //     $fecha_formato = $fecha->toDateString();
        
    //     $year = $fecha->format('y');
    //     $mes = $fecha->format('m');
    //     $dia = $fecha->format('d');

    //     return view('livewire.modal-detalles', compact('prueba','pacient'));
    //     return response()->json(['paciente'=>$a , 'doctor'=>$b , 'fecha'=>$dia.'-'.$mes.'-'.$year , 'estado'=>$registro->ESTADO]);
    // }
}
