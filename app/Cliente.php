<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Unidad_Negocio;
use App\Cede;

class Cliente extends Model
{
    protected $table = "cliente";

    protected $fillable = [
      'razon_social','Cuit', 'telefono', 'direccion', 'tipo'
    ];



}
