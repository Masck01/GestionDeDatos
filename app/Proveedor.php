<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = "proveedor";

    protected $fillable = [
        'razon_social', 'cuit', 'telefono', 'estado'
    ];
}
