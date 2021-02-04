<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Pablo',
            'email'=>'pablo@gmail.com',
            'username'=>'ppablo',
            'password'=>Hash::make('1234'),
            'empleado_id'=>'1'
        ]);
    }
}
