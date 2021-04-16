<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Cliente;
class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Cliente::create([
            'razon_social'=>'Los Ramones SA',
            'cuit'=>' 209123213123',
            'direccion'=>'Rivadavia 1000',
            'telefono'=>'3812487412',
            'tipo'=>'responsableinscripto',
            'estado'=>'Activo'
        ]);
        Cliente::create([
            'razon_social'=>'Camilo SA',
            'cuit'=>'2132314141',
            'direccion'=>'laprida 100',
            'telefono'=>'388213231441',
            'tipo'=>'responsableinscripto',
            'estado'=>'Activo'
        ]);
        Cliente::create([
            'razon_social'=>'Latigo SA',
            'cuit'=>'31223423423',
            'direccion'=>'Sarmiento 20',
            'telefono'=>'3812143423',
            'tipo'=>'responsableinscripto',
            'estado'=>'Activo'
        ]);



    }
}
