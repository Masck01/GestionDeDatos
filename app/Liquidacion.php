<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model
{
    protected $table = "liquidacion";
    protected $fillable = [
        'fecha_desde', 'fecha_hasta', 'salario_neto', 'salario_bruto', 'periodo_liquidacion', 'retenciones', 'estado', 'empleado_id'
    ];

    public function getFromDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'id', 'empleado_id');
    }

    public function linea_liquidacion()
    {
        return $this->hasMany(LineaLiquidacion::class,'liquidacion_id','id');
    }
}
