<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Empleado extends Model
{
    protected $table = 'empleado';

    protected $fillable = [
        'nombre', 'apellido', 'cuit', 'fecha_ingreso', 'categoria', 'cajadeahorro', 'sucursal_id'
    ];

    public static function empleado(){
        return Empleado::find(Auth::user()->id)->first();
    }
}
