<?php

namespace App\Http\Controllers;

use App\Exports\PruebasExport;
use App\Models\Prueba;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    public function export(Request $request){
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        
        // Verificar si los campos de fecha están vacíos
        if (empty($fechaInicio) && empty($fechaFin)) {
            // Obtener todos los datos sin aplicar filtro de fecha
            $datos = Prueba::all();
        } else {
        $fechaInicioFormatted = Carbon::createFromFormat('Y-m-d H:i:s', $fechaInicio . ' 00:00:00')->toDateTimeString();
        $fechaFinFormatted = Carbon::createFromFormat('Y-m-d H:i:s', $fechaFin . ' 23:59:59')->toDateTimeString();
        
        $datos = Prueba::whereBetween('created_at', [$fechaInicioFormatted, $fechaFinFormatted])->get();
        }
    
        return Excel::download(new PruebasExport($datos), 'pruebas.xlsx');
    }
}
