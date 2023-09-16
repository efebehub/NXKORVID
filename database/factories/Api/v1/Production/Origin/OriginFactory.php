<?php

namespace Database\Factories\Api\v1\Production\Origin;

use Illuminate\Database\Eloquent\Factories\Factory;

class OriginFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->title
        ];
    }
}
