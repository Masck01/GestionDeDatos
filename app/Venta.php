<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Venta extends Model
{
    protected $table = "venta";

    protected $fillable = [
        'empleado_id','fecha','hora','total','tipocliente', 'subtotalventa','iva', 'estado'
    ];

    public function detalle_pedido()
    {
        return $this->hasMany(Linea_Venta::class,'venta_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'usuario_id','id');
    }

   /* public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }*/

    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function getFromHoraAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('H:i:s');
    }

}
