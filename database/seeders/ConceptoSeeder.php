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
        Concepto::create([
            'descripcion' => 'salario basico',
            'tipo' => 'haber',
            'estado' => 'activo'
        ]);
    }
}
