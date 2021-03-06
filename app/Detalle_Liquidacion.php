<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Liquidacion extends Model
{
    protected $table = "detalle_liquidaciones";

    protected $primaryKey = 'id';

    protected $fillable = [
      'liquidacion_id', 'unidad_id', 'haberes','cantidad'
    ];

    public function concepto()
    {
        return $this->belongsTo(Concepto::class);
    }


}
