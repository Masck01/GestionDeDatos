<?php

use App\Sucursal;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sucursal::create([
            'razon_social'=>'Farmacia Avellaneda',
            'direccion'=>'Esquina Norte',
            'telefonos'=>'3219999',
            'cuit'=>'2022224332',
        ]);
        //
    }
}
