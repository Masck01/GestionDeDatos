<?php

namespace Database\Seeders;

use App\Capacidad;
use Illuminate\Database\Seeder;

class CapacidadSeeder extends Seeder
{

    public function run()
    {
        Capacidad::create([
            'cantidad'=>'1',
            'estado' => 'Activo'
        ]);

        Capacidad::create([
            'cantidad'=>'100',
            'estado' => 'Activo'
        ]);

        Capacidad::create([
            'cantidad'=>'200',
            'estado' => 'Activo'
        ]);

        Capacidad::create([
            'cantidad'=>'750',
            'estado' => 'Activo'
        ]);
    }
}
