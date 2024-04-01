<?php

namespace App\Livewire;

use App\Models\Pacient;
use App\Models\Prueba;
use App\Models\Tamizaje;
use App\Models\User;
use Livewire\Component;

class ModalEditar extends Component
{
    public $open = false;
    public $name; 
    public $prueba;

    public function mount(Prueba $prueba)
    {
        $this->prueba = $prueba;
    }

    public function render()
    {
        $detalle = Prueba::find($this->prueba->id); // Usamos $this->prueba para obtener el ID de la prueba
        $user = User::all();
        $tamizajes = Tamizaje::all();        
        return view('livewire.modal-editar', compact('tamizajes','detalle', 'user'));
    }
}
