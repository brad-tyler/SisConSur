<?php

namespace App\Exports;

use App\Models\Pacient;
use Maatwebsite\Excel\Concerns\FromCollection;

class PacientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pacient::all();
    }
}
