<?php

namespace Database\Seeders;

use App\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'email'=>'pablo@gmail.com',
            'username'=>'ppablo',
            'password'=>Hash::make('1234'),
            'empleado_id'=>'1'
        ]);
    }
}
