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
        $tamizajes = [  ['NAME' => 'TAMIZAJE DE VIOLENCIA', 'CODIGO' => '01'], 
                        ['NAME' => 'TAMIZAJE DE ALCOHOL Y DROGAS', 'CODIGO' => '02'], 
                        ['NAME' => 'TAMIZAJE DE TRANSTORNOS DEPRESIVOS', 'CODIGO' => '03'], 
                        ['NAME' => 'TAMIZAJE DE PSICOSIS', 'CODIGO' => '04'],
                        ['NAME' => 'TAMIZAJE ESPECIALIZADO PARA DETECTAR DETERIORO COGNITIVO-DEMENCIA EN PERSONAS DE 60 AÑOS Y MAS', 'CODIGO' => '06'],
                        ['NAME' => 'TAMIZAJE PARA DETECTAR TRANSTORNOS MENTALES Y DEL COMPORTAMIENTO DE NIÑOS, NIÑAS Y ADOLESCENTES DE 3 A 17 AÑOS', 'CODIGO' => '07'],
                        ['NAME' => 'TAMIZAJE DE PREVENCION DE RIESGOS EN SALUD MENTAL', 'CODIGO' => '08']
                    ];
        DB::table('tamizajes')->insert($tamizajes);
    }
}
