<?php

namespace Database\Seeders;

use App\CategoriadeProducto;
use Illuminate\Database\Seeder;

class CategoriadeProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriadeProducto::create([
            'nombre'=>'cuidado capilar',
            'estadocategoria' => 'Activo'
        ]);

        CategoriadeProducto::create([
            'nombre'=>'cuidado bucal',
            'estadocategoria' => 'Activo'
        ]);

        CategoriadeProducto::create([
            'nombre'=>'cuidado personal',
            'estadocategoria' => 'Activo'
        ]);
    }
}
