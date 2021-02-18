<?php

namespace Database\Seeders;

use App\Categoria;
use App\ConfiguracionCategoria;
use App\Empleado;
use Illuminate\Database\Seeder;

class ConfiguracionCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfiguracionCategoria::create([
            'montofijo' => Categoria::find(Empleado::first()->categoria_id)->salario_basico,
            'montovariable' => null,
            'unidad' => 1,
            'concepto_id' => 1,
            'categoria_id' => 1,
        ]);
    }
}
