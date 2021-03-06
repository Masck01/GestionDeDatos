<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoCaja extends Model
{
    protected $table = "movimientos_cajas";

    protected $fillable = [
        'cajas_id',
        'descripcion',
        'entrada',
        'salida'
    ];

    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s');
    }
}
