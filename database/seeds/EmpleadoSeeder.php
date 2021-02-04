<?php

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
            'fecha_ingreso'=>'2020-02-02',
            'categoria_id'=>'1',
            'cajadeahorro_id'=>'1',
            'sucursal_id'=>'1'
        ]);
    }
}
