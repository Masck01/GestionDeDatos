<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';

    protected $fillable = [
        'nombre', 'apellido', 'cuit', 'fecha_ingreso', 'categoria', 'cajadeahorro', 'sucursal_id'
    ];
}
