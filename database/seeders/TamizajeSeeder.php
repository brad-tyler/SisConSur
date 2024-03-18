<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//traer la base de datos
use Illuminate\Support\Facades\DB;

class TamizajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Crearemos cuatro tipos de tamizaje
        $tamizajes = [ ['NAME'=>'A', 'CODIGO'=>'01'], ['NAME'=>'B', 'CODIGO'=>'02' ], ['NAME'=>'C', 'CODIGO'=>'03'] , ['NAME'=>'D', 'CODIGO'=>'04']];
        DB::table('tamizajes')->insert($tamizajes);

    }
}
