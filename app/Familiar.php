<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
  protected $table = "grupo_familiar";

  protected $fillable = [
    'nombre', 'fechaNacimiento', 'parentesco', 'dni','usuario_id'
  ];
}