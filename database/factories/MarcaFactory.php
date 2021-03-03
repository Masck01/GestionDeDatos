<?php

namespace Database\Factories;

use App\Marca;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarcaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Marca::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $estado = ['activo', 'inactivo'];
        return [
            'codigo' => $this->faker->randomDigitNotNull,
            'nombre' => $this->faker->streetName,
            'estado' => $estado[rand(0, 1)]
        ];
    }
}
