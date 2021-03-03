<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegrationAssertPostConditions;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions_admin = [];
        array_push($permissions_admin, Permission::create(['name' => 'ventas_list']));
        array_push($permissions_admin, Permission::create(['name' => 'compras_list']));
        array_push($permissions_admin, Permission::create(['name' => 'inventario_list']));
        array_push($permissions_admin, Permission::create(['name' => 'tareas_list']));
        array_push($permissions_admin, Permission::create(['name' => 'caja_list']));
        array_push($permissions_admin, Permission::create(['name' => 'ajustes_list']));
        array_push($permissions_admin, Permission::create(['name' => 'ayuda_index']));

        $role_admin = Role::create(['name' => 'Super Administrador']);
        $role_admin->syncPermissions($permissions_admin);

        $userpablo = Usuario::find(1);


        // $userrtorfe = User::create([
        //     'nombre' => 'Roberto Huallí',
        //     'apellido' => 'Torfe',
        //     'username' => 'rtorfe',
        //     'password' => Hash::make('Pellegrini1531'),
        //     'email' => 'roberto@torfe.com',

        // ]);

        /* $useragauna = User::create([
          'nombre' => 'Angel',
          'apellido' => 'Gauna',
          'username' => 'agauna',
          'password' => Hash::make('1234'),
          'email' => 'angel@gauna.com',

      ]); */

        //$userrtorfe->assignRole('Super Administrador');
        $userpablo->assignRole('Super Administrador');
    }
}
