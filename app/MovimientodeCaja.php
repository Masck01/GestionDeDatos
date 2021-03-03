<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientodeCaja extends Model
{
    protected $table = "movimientodecaja";

    protected $fillable = [
        'caja_id',
        'descripcion',
        'entrada',
        'salida'
    ];

    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s');
    }
}
