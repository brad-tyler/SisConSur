<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Tamizaje;

class ModalPrueba extends Component
{
    public $open = false;
    public $paciente;
    public $name;

    public function render()
    {
        $tamizajes = Tamizaje::all();
        return view('livewire.modal-prueba', compact('tamizajes'));
    }
}
