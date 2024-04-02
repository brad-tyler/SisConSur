<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pacient;
use App\Models\Prueba;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(TamizajeSeeder::class);


        User::factory()->create([
            'name' => 'henry',
            'email' => 'test@example.com',
            'password' => bcrypt('1234678'),
            'estado' => true,
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('passwordadmin'),
            'estado' => true,
        ]);

        User::factory(10)->create();

        Pacient::factory(1000)->create();

        Prueba::factory(50)->create();



        //

        
    }
}
