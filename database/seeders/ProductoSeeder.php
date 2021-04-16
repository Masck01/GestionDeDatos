<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre'=>'jabon tocador',
            'descripcion'=>'jabon de tocador',
            'imagen'=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu2I3acHg8EifTQPmPgoR4oDLQFubdo1MayvnakMXLkgJG61vsjIL7Wgr8iyn1zQcqTfxz7s_DRFE&usqp=CAc",
            'fecha_vencimiento'=>'2020-04-02',
            'precio_compra'=>'150',
            'precio_venta'=>'200',
            'estado'=>'Disponible',
            'stock'=>'100',
            'almacen_id'=>'1',
            'categoria_id'=>'3',
            'marca_id'=>'3',
            'capacidad_id'=>'1',
            'proveedor_id'=>'1'
        ]);
        Producto::create([
            'nombre'=>'Desodorante p/hombre',
            'descripcion'=>'desodorante 1 un',
            'imagen'=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu2I3acHg8EifTQPmPgoR4oDLQFubdo1MayvnakMXLkgJG61vsjIL7Wgr8iyn1zQcqTfxz7s_DRFE&usqp=CAc",
            'fecha_vencimiento'=>'2020-04-02',
            'precio_compra'=>'150',
            'precio_venta'=>'200',
            'estado'=>'Disponible',
            'stock'=>'100',
            'almacen_id'=>'1',
            'categoria_id'=>'3',
            'marca_id'=>'3',
            'capacidad_id'=>'1',
            'proveedor_id'=>'1'
        ]);
        Producto::create([
            'nombre'=>'dentrifico',
            'descripcion'=>'super blanco',
            'imagen'=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmtIaFCCaRNK23ClEnP9dzWgys1FKcpHOyjraOQUr0LcUW7-m6JKMYpBk4E-n3KZH6Vv6mssw&usqp=CAc",
            'fecha_vencimiento'=>'2020-04-02',
            'precio_compra'=>'50',
            'precio_venta'=>'80',
            'estado'=>'Disponible',
            'stock'=>'50',
            'almacen_id'=>'1',
            'categoria_id'=>'2',
            'marca_id'=>'1',
            'capacidad_id'=>'1',
            'proveedor_id'=>'1'
        ]);
        Producto::create([
            'nombre'=>'Enjuague bucal',
            'descripcion'=>'colgate plax',
            'imagen'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzTv1bnYgaiYdc6T95vyeJMjbaWzRjdrtdUyt-P7EzKZEzcWLASpL0127jAg&usqp=CAc',
            'fecha_vencimiento'=>'2020-04-02',
            'precio_compra'=>'100',
            'precio_venta'=>'150',
            'estado'=>'Disponible',
            'stock'=>'100',
            'almacen_id'=>'1',
            'categoria_id'=>'2',
            'marca_id'=>'2',
            'capacidad_id'=>'3',
            'proveedor_id'=>'1'
        ]);
        Producto::create([
            'nombre'=>'jabon liquido',
            'descripcion'=>'jabon para manos',
            'imagen'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmnwTBrT00UrvVAZK-fV-jB-_a6cRowslz1A&usqp=CAU',
            'fecha_vencimiento'=>'2020-04-02',
            'precio_compra'=>'200',
            'precio_venta'=>'250',
            'estado'=>'Disponible',
            'stock'=>'100',
            'almacen_id'=>'1',
            'categoria_id'=>'3',
            'marca_id'=>'3',
            'capacidad_id'=>'1',
            'proveedor_id'=>'1'
        ]);
        Producto::create([
            'nombre'=>'Shampoo neutro',
            'descripcion'=>'shampoo pelo lazio',
            'imagen'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWN6wq3m3evbsqnNXf0qgr3q0KEzG_VnlnG4Bes396VfpakWbhy0bIvlMg3ku06DO1_PrmXyo&usqp=CAc',
            'fecha_vencimiento'=>'2020-04-02',
            'precio_compra'=>'150',
            'precio_venta'=>'200',
            'estado'=>'Disponible',
            'stock'=>'100',
            'almacen_id'=>'1',
            'categoria_id'=>'1',
            'marca_id'=>'1',
            'capacidad_id'=>'1',
            'proveedor_id'=>'1'
        ]);
    }
}
