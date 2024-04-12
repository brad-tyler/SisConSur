<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pacient;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;



class ExportController extends Controller
{
    public function pdf()
    {

        $pacientes = Pacient::paginate(); // Obtiene los datos de la base de datos mediante el modelo
        $pdf = \PDF::loadView('reportes/pdf', ['pacientes' => $pacientes]);
        return $pdf->stream();

        //return view('reportes/pdf', compact('pacientes'));
    }

    public function excel()
    {
        $pacientes = Pacient::paginate();
        return Excel::download(new ProductsExport($products), 'products.xlsx');
    }
}
