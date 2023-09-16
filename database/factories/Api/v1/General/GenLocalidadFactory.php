<?php

namespace Database\Factories\Api\v1\General;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenLocalidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $idprovincia = $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]);

        return [
            'idprovincia' => $idprovincia,
            'descripcion'=>$this->faker->city(),
            'cp'=>$this->faker->postcode(),
        ];
    }
}
