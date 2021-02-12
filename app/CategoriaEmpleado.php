<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaEmpleado extends Model
{
    protected $table = "categoria";

    protected $fillable = [
        'nombre','estado'
    ];
    
}
