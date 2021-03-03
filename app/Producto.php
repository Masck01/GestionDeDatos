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
    public function categoria()
    {
        return $this->hasOne(CategoriadeProducto::class,'id','categoria_id');
    }
    public function capacidad()
    {
        return $this->hasOne(Capacidad::class,'id','capacidad_id');
    }

    public function almacen()
    {
        return $this->hasOne(AlmacenDeMedicamentos::class,'id','almacen_id');
    }

    public function marcas()
    {
        return $this->hasOne(Marca::class,'id','marca_id');
    }
    public function proveedor()
    {
        return $this->hasOne(Proveedor::class,'id','proveedor_id');
    }
}

