<?php

namespace Database\Seeders;

use App\Capacidad;
use App\ConfiguracionCategoria;
use App\Marca;
use App\Producto;
use App\Proveedor;
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
        //Seeders
        $this->call(SucursalSeeder::class);
        $this->call(ProvinciaSeeder::class);
        $this->call(AlmacenDeMedicamentosSeeder::class);
        $this->call(BancoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ConceptoSeeder::class);
        $this->call(CajaDeAhorroSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(CajaSeeder::class);
        $this->call(ConfiguracionCategoriaSeeder::class);

        // Factorys
        ConfiguracionCategoria::factory()->count(20)->create();
        Proveedor::factory()->count(3)->create();
        Capacidad::factory()->count(10)->create();
        Marca::factory()->count(20)->create();
        Producto::factory()->count(20)->create();
    }
}
