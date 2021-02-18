<?php

namespace Database\Seeders;

use App\Banco;
use Illuminate\Database\Seeder;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banco::create([
            'nombre'=>'Macro',
            'direccion'=>'San Martin 700',
        ]);
    }
}
