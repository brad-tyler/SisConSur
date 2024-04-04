<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Spatie\Permission\Models\Role;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Http\Request;


use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function listadoctores()
    {
        $doctores = User::orderBy('id', 'DESC')->paginate(5);
        return view('administrador', compact('doctores'));
    }


    public function registrardoctor(Request $request)
    {

        $con = $request->input('password');

        $con = bcrypt($con);

        $doctor =  new User;

        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->password = $con;
        $doctor->estado = true;
        $doctor->save();
        $doctor->assignRole("usuario");

        return redirect()->route("doctores");
    }


    public function cambiarEstado($id)
    {
        // Encuentra el registro en la base de datos
        $registro = User::findOrFail($id);

        if ($registro->estado == 0) {
            $registro->syncRoles("usuario");
        } else {
            $registro->syncRoles("inactivo");
        }

        // Cambia el estado del registro
        $registro->estado = !$registro->estado; // Por ejemplo, cambia de verdadero a falso o viceversa

        

        // Guarda los cambios en la base de datos
        $registro->save();

        // Redirige de vuelta a la página anterior o a donde sea apropiado
        return redirect()->back();
    }
}
