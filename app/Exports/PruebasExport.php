<?php

namespace App\Exports;

use App\Models\Prueba;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PruebasExport implements FromView
// class PruebasExport implements FromCollection
{
    protected $datos;

    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    // public function collection()
    // {
    //     return $this->datos;
    // }

    public function view(): View
    {
        return view('admin.exportPruebas',[
            'pruebas' => $this->datos
        ]);
    }
}
