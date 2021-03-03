<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenDeMedicamentos extends Model
{
    use HasFactory;

    protected $table = 'almacendemedicamento';
    protected $fillable = [
        'nombre', 'telefono', 'direccion', 'ciudad', 'codigo_postal', 'estado', 'sucursal_id', 'provincia_id'
    ];
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

}
