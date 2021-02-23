<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaLiquidacion extends Model
{
    protected $table = 'linealiquidacion';

    protected $fillable = [
        'unidad', 'mmontofijo', 'montovariable', 'concepto_id', 'liquidacion_id'
    ];

    public function liquidacion()
    {
        return $this->hasMany(Liquidacion::class, 'id', 'liquidacion_id');
    }
}
