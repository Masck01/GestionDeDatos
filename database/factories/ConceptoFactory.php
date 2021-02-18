<?php

namespace Database\factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Concepto;

class ConceptoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Concepto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $estado = ['activo', 'inactivo'];
        $tipo = ['haber', 'retencion'];

        return [
            'descripcion' => $this->faker->jobTitle,
            'tipo' => $tipo[rand(0, 1)],
            'estado' => $estado[rand(0, 1)],
            'updated_at' => now(),
            'created_at' => now()
        ];
    }
}
