<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Empleado extends Model
{
    protected $table = 'empleado';

    protected $fillable = [
        'apellido', 'nombre', 'cuit', 'email', 'telefono_celular', 'telefono_fijo', 'domicilio','estado', 'fecha_ingreso', 'categoria_id', 'cajadeahorro_id', 'sucursal_id'
    ];

    public static function empleado(){
        return Empleado::find(Auth::user()->id)->first();
    }
}
