<?php

namespace Database\Seeders;

use App\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create([
            'nombre'=>'Sedal',
            'codigo'=>'100',
            'estado' => 'Activo'
        ]);

        Marca::create([
            'nombre'=>'Colgate',
            'codigo'=>'101',
            'estado' => 'Activo'
        ]);

        Marca::create([
            'nombre'=>'Rexona',
            'codigo'=>'102',
            'estado' => 'Activo'
        ]);
       }
}
