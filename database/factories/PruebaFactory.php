<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Pacient;

use App\Models\Tamizaje;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prueba>
 */
class PruebaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $pacient = Pacient::all()->random();
        $tamizaje = Tamizaje::all()->random();
        $user = User::all()->random();

        return [
            'pacient_id'=>$pacient->id,
            'tamizaje_id'=>$tamizaje->id,
            'user_id' =>$user->id,
            'ESTADO'=> $this->faker->randomElement([true,false]),
            'LUGAR' => $this->faker->text(),
            'EDAD'=> $this->faker->randomNumber(),
            'TIPO'=> $this->faker->randomElement(['ADOLECENTE','GESTANTE','ADULTO','INFANTE']),
        ];
    }
}
