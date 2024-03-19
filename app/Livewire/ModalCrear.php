<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use \App\Models\Pacient;
use Livewire\Component;

class ModalCrear extends Component
{
    public $open = false;
    public function render()
    {
        return view('livewire.modal-crear');
    }
}
