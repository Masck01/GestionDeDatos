<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = "compra";


    protected $fillable = [
      'proveedor_id','usuario_id','hora','fechaalta', 'fechacompra','tipoproveedor','subtotalcompra','ivacompra','total','nrofactura'
    ];

    public function detalle_compra()
    {
        return $this->hasMany(Detalle_Compra::class,'compra_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'usuario_id');
    }

    public function deposito()
    {
        return $this->belongsTo(Deposito::class,'deposito_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class,'proveedor_id');
    }

   /*  public functiom empleado()
    {
        return $this->belongsTo(Empleado::class,'empleado_id');
    } */
    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
    public function getFromHoraAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('H:i:s');
    }
}
