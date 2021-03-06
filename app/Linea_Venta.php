<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_Venta extends Model
{
    protected $table = "lineadeventa";

    protected $primaryKey = 'id';

    protected $fillable = [
        'subtotal','cantidad','producto_id','venta_id','proveedor_id'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class,'proveedor_id','id');
    }

}
