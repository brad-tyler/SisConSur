<?php

namespace App\Http\Controllers;

use App\Exports\PruebasExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    public function export(){
        return Excel::download(new PruebasExport, 'Pruebas.xlsx');
    }
}
