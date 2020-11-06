<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Precio_Producto;
use App\Producto_en_Servicio;

class Producto extends Model
{
    protected $table = "productos";

    protected $fillable = [
      'codigo','categoria_id' ,'nombre', 'descripcion', 'imagen', 'costo_p', 'costo_d', 'p_flete_p', 'p_flete_d',
      'p_local_1p', 'p_local_1d', 'p_local_2p', 'p_local_2d', 'p_ml_p', 'p_ec_p', 'unidadnegocio_id'
    ];

    public function depositos()
    {
        return $this->belongsToMany(Deposito::class);
    }

    public function categoria()
    {
        return $this->hasOne(subCategoria::class,'id','subcategoria_id');
    }

    public function marcas()
    {
        return $this->hasOne(Marca::class,'id','marcas_id');
    }

    public function deposito()
    {
        return $this->hasOne(Deposito::class,'id','deposito_id');
    }

    public function proveedor()
    {
        return $this->hasOne(Proveedor::class,'id','proveedor_id');
    }

    public function capacidad()
    {
        return $this->hasOne(Capacidad::class,'id','capacidad_id');
    }
  
}
