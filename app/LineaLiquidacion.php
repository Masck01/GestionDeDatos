<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaLiquidacion extends Model
{
    protected $table = 'linealiquidacion';

    protected $fillable = [
        'montofijo', 'montovariable', 'unidad', 'concepto_id', 'liquidacion_id'
    ];

    public function liquidacion()
    {
        return $this->hasOne(Liquidacion::class, 'id', 'liquidacion_id');
    }

    public function concepto()
    {
        return $this->hasMany(Concepto::class, 'id', 'concepto_id');
    }
}
