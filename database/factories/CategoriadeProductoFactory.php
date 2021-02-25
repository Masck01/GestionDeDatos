<?php

namespace Database\Factories;

use App\CategoriadeProducto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriadeProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoriadeProducto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $estado = ['activo', 'inactivo'];
        return [
            'nombre' => $this->faker->city,
            'estadocategoria' => $estado[rand(0, 1)]
        ];
    }
}
