<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SucursalSeeder::class);
        $this->call(BancoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(CajaDeAhorroSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        // $this->call(PermissionsTableSeeder::class);
        // $this->call(ProvinciasTableSeeder::class);
        // $this->call(RubrosTableSeeder::class);
        // $this->call(UnidadesNegocioTableSeeder::class);
        //$this->call(DepositosTableSeeder::class);
        //$this->call(ProductosTableSeeder::class);
        //$this->call(DepositoProductoTableSeeder::class);
        // $this->call(TiposTareasTableSeeder::class);
    }
}
