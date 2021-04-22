<?php

namespace Database\Seeders;

use App\CajaDeAhorro;
use Illuminate\Database\Seeder;

class CajaDeAhorroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CajaDeAhorro::create([
            'codigo'=>'11111',
            'banco_id'=>'1'
        ]);

        CajaDeAhorro::create([
            'codigo'=>'22222',
            'banco_id'=>'1'
        ]);
    }
}
