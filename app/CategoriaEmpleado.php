<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaEmpleado extends Model
{
    protected $table = "categorias_empleados";

    protected $fillable = [
        'nombre','estado'
    ];
    
}
