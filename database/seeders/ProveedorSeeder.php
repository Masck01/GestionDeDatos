<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Proveedor;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
            'razon_social'=>'Laboratorio NOA',
            'cuit'=>'2022222323243',
            'telefono'=>'3812349043',
            'estado'=>'Activo'
        ]);
        Proveedor::create([
            'razon_social'=>'Laboratorio Barrio Norte',
            'cuit'=>'2222323243',
            'telefono'=>'381233043',
            'estado'=>'Activo'
        ]);
    }
}
