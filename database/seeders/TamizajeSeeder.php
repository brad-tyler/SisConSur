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
        $tamizajes = [  ['NAME' => 'VIOLENCIA', 'CODIGO' => '01'], 
                        ['NAME' => 'ALCOHOL Y DROGAS', 'CODIGO' => '02'], 
                        ['NAME' => 'TRANSTORNOS DEPRESIVOS', 'CODIGO' => '03'], 
                        ['NAME' => 'PSICOSIS', 'CODIGO' => '04'],
                        ['NAME' => 'DETERIORO COGNITIVO-DEMENCIA EN PERSONAS DE 60 AÑOS Y MAS', 'CODIGO' => '06'],
                        ['NAME' => 'TRANSTORNOS MENTALES Y DEL COMPORTAMIENTO DE NIÑOS, NIÑAS Y ADOLESCENTES DE 3 A 17 AÑOS', 'CODIGO' => '07'],
                        ['NAME' => 'PREVENCION DE RIESGOS EN SALUD MENTAL', 'CODIGO' => '08']
                    ];
        DB::table('tamizajes')->insert($tamizajes);
    }
}
