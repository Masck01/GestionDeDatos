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
                'tipo' => 'haber',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'aporte jubilatorio',
                'tipo' => 'retencion',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'aguinaldo',
                'tipo' => 'haber',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'antiguedad',
                'tipo' => 'haber',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'obra social',
                'tipo' => 'retencion',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'bonificacion por tiempo pleno',
                'tipo' => 'haber',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'descuento afip',
                'tipo' => 'retencion',
                'estado' => 'activo'
            ],
            [
                'descripcion' => 'inasistencias',
                'tipo' => 'retencion',
                'estado' => 'inactivo'
            ]
        ];
        collect($conceptos)->each(function ($concepto) {

            Concepto::create($concepto);
        });
    }
}
