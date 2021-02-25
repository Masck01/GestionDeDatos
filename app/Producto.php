<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Precio_Producto;
use App\Producto_en_Servicio;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = "producto";

    protected $fillable = [
        'nombre', 'descripcion', 'imagen,', 'fecha_vencimiento', 'precio_compra', 'precio_venta', 'estado', 'stock', 'almacen_id', 'categoria_id', 'marca_id', 'proveedor_id'
    ];
}
