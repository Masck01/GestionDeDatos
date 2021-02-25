<?php

namespace Database\Seeders;

use App\Provincia;
use Illuminate\Database\Seeder;
use Schema;
use Faker\Factory;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provincia::create([
            'nombre' => 'Tucuman'
        ]);
    }
}
