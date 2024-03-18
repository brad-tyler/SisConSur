<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PacientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'DNI'=> $this->faker->unique()->randomNumber(8),
            'NAME' => fake()->name(),
            'SURNAME'=> $this->faker->text(),
            'EDAD'=> $this->faker->randomNumber(),
            'TIPO'=> $this->faker->randomElement(['ADOLECENTE','GESTANTE','ADULTO','INFANTE']),
            'SEXO'=> $this->faker->randomElement(['M','F']),
        ];
    }
}
