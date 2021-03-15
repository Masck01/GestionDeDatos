<?php

namespace Database\Seeders;

use App\Categoria;
use App\ConfiguracionCategoria;
use App\Empleado;
use App\Concepto;
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

        $concepto = Concepto::get()->skip(1);
        $concepto->each(function ($concepto) {
            $tipo = Concepto::find($concepto->id)->tipo;
            ConfiguracionCategoria::create(

                [
                    'montofijo' => null,
                    'montovariable' => rand(1, 5) ,
                    'unidad' => 1,
                    'concepto_id' => $concepto->id,
                    'categoria_id' => '1',
                ]
            );
        });
    }
}
