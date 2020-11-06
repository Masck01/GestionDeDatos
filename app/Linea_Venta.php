<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_Venta extends Model
{
    protected $table = "linea_ventas";

    protected $primaryKey = 'id';

    protected $fillable = [
      'venta_id', 'producto_id', 'cantidad','precio'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

}
