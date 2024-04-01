<?php

namespace App\Livewire;

use Livewire\Component;

class ModalNuevoDoctor extends Component
{

    public $open = false;
    
    public function render()
    {
        return view('livewire.modal-nuevo-doctor');
    }
}
