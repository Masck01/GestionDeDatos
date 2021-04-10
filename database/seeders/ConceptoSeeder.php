<?php

namespace Database\Seeders;

use App\Concepto;
use Illuminate\Database\Seeder;

class ConceptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conceptos = [
            [
                'descripcion' => 'salario basico',
                'tipo' => 'Haber',
                'estado' => 'Activo'
            ],
            [
                'descripcion' => 'aporte jubilatorio',
                'tipo' => 'Retencion',
                'estado' => 'Activo'
            ],
            [
                'descripcion' => 'aguinaldo',
                'tipo' => 'Haber',
                'estado' => 'Activo'
            ],
            [
                'descripcion' => 'antiguedad',
                'tipo' => 'Haber',
                'estado' => 'Activo'
            ],
            [
                'descripcion' => 'obra social',
                'tipo' => 'Retencion',
                'estado' => 'Activo'
            ],
            [
                'descripcion' => 'bonificacion por tiempo pleno',
                'tipo' => 'Haber',
                'estado' => 'Activo'
            ],
            [
                'descripcion' => 'descuento afip',
                'tipo' => 'Retencion',
                'estado' => 'Activo'
            ],
            [
                'descripcion' => 'inasistencias',
                'tipo' => 'Retencion',
                'estado' => 'Inactivo'
            ]
        ];
        collect($conceptos)->each(function ($concepto) {

            Concepto::create($concepto);
        });
    }
}
