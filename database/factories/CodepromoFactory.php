<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CodepromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           "Nom"=>$this->faker->name,
           "code"=>$this->faker->name,
            "Pourcentage"=>$this->faker->randomNumber,
        ];
    }
}
