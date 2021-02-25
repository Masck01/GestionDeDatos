<?php

namespace Database\Factories;

use App\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $estado = ['activo', 'inactivo'];
        return [
            'razon_social' => $this->faker->address,
            'cuit' => $this->faker->numberBetween(22000000001, 30000000000),
            'telefono' => $this->faker->numerify('#########'),
            'estado' => $estado[rand(0, 1)]
        ];
    }
}
