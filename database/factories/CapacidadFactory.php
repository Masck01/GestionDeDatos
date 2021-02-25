<?php

namespace Database\Factories;

use App\Capacidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class CapacidadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Capacidad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $estado = ['activo', 'inactivo'];
        return [
            'cantidad' => rand(1, 100),
            'estado' => $estado[rand(0, 1)]
        ];
    }
}
