<?php

namespace Database\Seeders;

use App\AlmacenDeMedicamentos;
use Illuminate\Database\Seeder;

class AlmacenDeMedicamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AlmacenDeMedicamentos::create([
            'nombre' => '',
            'telefono' => 44433434,
            'direccion' => 'Esq Norte 355',
            'ciudad' => 'Tucuman',
            'codigo_postal' => '4000',
            'estado' => 'Activo',
            'sucursal_id' => 1,
            'provincia_id' => 1
        ]);
    }
}
