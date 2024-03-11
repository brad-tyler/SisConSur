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
        $tamizajes = [ ['NAME'=>'A'], ['NAME'=>'B'], ['NAME'=>'C'] , ['NAME'=>'D']];
        DB::table('tamizajes')->insert($tamizajes);

    }
}
