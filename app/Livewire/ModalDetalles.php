<?php

namespace App\Livewire;

use App\Models\Prueba;
use App\Models\User;
use Carbon\Carbon;
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
}
