<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
  protected $table = "concepto";

  protected $fillable = [
    'descripcion', 'tipo', 'estado'
  ];
}

//sa