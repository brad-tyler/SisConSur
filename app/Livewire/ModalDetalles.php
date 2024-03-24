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
        return view('livewire.modal-detalles');
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
