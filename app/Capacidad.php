<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacidad extends Model
{
    protected $table = "capacidad";

    protected $fillable = [
        'cantidad','estado'
    ];
    
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
