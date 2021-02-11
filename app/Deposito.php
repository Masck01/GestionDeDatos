<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
  protected $table = "almacendemedicamento";

  protected $fillable = [
    'nombre', 'telefonos', 'direccion', 'ciudad', 'codigo_postal', 'provincia_id'
  ];

  public function provincia()
  {
      return $this->belongsTo(Provincia::class);
  }

  public function productos()
  {
      return $this->belongsToMany(Producto::class);
  }
}
