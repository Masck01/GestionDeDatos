<?php

namespace Database\Factories;

use App\ConfiguracionCategoria;
use App\Concepto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfiguracionCategoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConfiguracionCategoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $concepto = Concepto::factory()->create();
        $tipo = Concepto::find($concepto->id)->tipo;
        return [
            'montofijo' => ($tipo == 'Haber') ? rand(1, 40) : null,
            'montovariable' => ($tipo == 'Retencion') ? rand(1, 40) : null,
            'unidad' => rand(1, 10),
            'concepto_id' => $concepto->id,
            'categoria_id' => '1',
        ];
    }
}
