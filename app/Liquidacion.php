<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model
{
    protected $table = "liquidaciones";


    protected $fillable = [
      'usuario_id','fechaDesde','fechaHasta','periodo','salarioNeto','retenciones','salarioBruto'
    ];

    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function detalle_liquidacion()
    {
        return $this->hasMany(Detalle_Liquidacion::class,'liquidacion_id','id');
    }

    public function usuario()
    {
        return $this->hasOne(User::class,'id','usuario_id');
    }
}
