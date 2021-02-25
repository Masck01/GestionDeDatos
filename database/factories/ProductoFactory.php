<?php

namespace Database\Factories;

use App\Capacidad;
use App\CategoriadeProducto;
use App\Marca;
use App\Producto;
use App\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $estado = ['disponible', 'no disponible'];
        $categoria_de_producto = CategoriadeProducto::factory()->create();
        $marca = Marca::get();
        $capacidad = Capacidad::get();
        $proveedor = Proveedor::get();
        $selector = rand(0, 1);
        return [
            'nombre' => $this->faker->catchPhrase,
            'descripcion' => $this->faker->catchPhrase,
            'imagen' => $this->faker->macPlatformToken,
            'fecha_vencimiento' => $this->faker->dateTimeBetween('now', '30 years'),
            'precio_compra' => $this->faker->randomFloat(2, 1, 1000),
            'precio_venta' => $this->faker->randomFloat(2, 100, 10000),
            'estado' => $estado[$selector],
            'stock' => $estado[$selector] == 'no disponible' ? 0 : $this->faker->randomDigitNotNull,
            'almacen_id' => 1,
            'categoria_id' => $categoria_de_producto->id,
            'marca_id' => $marca[rand(0,19)]->id,
            'capacidad_id' => $capacidad[rand(0,9)],
            'proveedor_id' => $proveedor[rand(0, 2)]->id,
        ];
    }
}
