<?php

namespace Database\Seeders;

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'descripcion'=>'Administrador',
            'salario_basico' => '60000',
            'estado' => 'Activo'
        ]);
    }
}
