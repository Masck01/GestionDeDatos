<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Unidad_Negocio;

class Provincia extends Model
{
  protected $table = "provincia";

  protected $fillable = [
      'nombre'
  ];

}
