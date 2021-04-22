<?php

namespace Database\Seeders;

use App\Empleado;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleado::create([
            'nombre'=>'Pablo',
            'apellido'=>'Beckker',
            'cuit'=>'202222232',
            'fecha_ingreso'=>'2020-02-02',
            'categoria_id'=>'1',
            'cajadeahorro_id'=>'1',
            'sucursal_id'=>'1'
        ]);

        Empleado::create([
            'nombre'=>'Cacho',
            'apellido'=>'Garay',
            'cuit'=>'24222232',
            'fecha_ingreso'=>'2020-04-02',
            'categoria_id'=>'2',
            'cajadeahorro_id'=>'2',
            'sucursal_id'=>'1'
        ]);

    }
}
