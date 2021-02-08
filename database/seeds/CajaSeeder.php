<?php

use Illuminate\Database\Seeder;
use App\Caja;

class CajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Caja::create([
            'nombre'=>'Caja 1'
            ]);
    }
}
