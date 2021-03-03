<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
  protected $table = "grupofamiliar";

  protected $fillable = [
    'dni','apellido','nombre', 'fecha_nacimiento', 'parentesco','empleado_id'
  ];
}