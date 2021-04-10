<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Concepto extends Model
{
    use HasFactory;
    protected $table = "concepto";

    protected $fillable = [
        'descripcion', 'tipo', 'estado'
    ];

}
