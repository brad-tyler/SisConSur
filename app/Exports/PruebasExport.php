<?php

namespace App\Exports;

use App\Models\Prueba;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PruebasExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.exportPruebas',[
            'pruebas' => Prueba::all()
        ]);
    }
}
