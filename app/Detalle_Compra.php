<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Compra extends Model
{
    protected $table = "lineadecompra";

    protected $primaryKey = 'id';

    protected $fillable = [
      'compra_id', 'producto_id', 'cantidad','precio'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function deposito()
    {
        return $this->belongsTo(Deposito::class);
    }


}
