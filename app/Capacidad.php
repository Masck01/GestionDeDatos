<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacidad extends Model
{
    protected $table = "capacidades";

    protected $fillable = [
        'nombre'
    ];
    
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
