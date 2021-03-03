<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacidad extends Model
{
    use HasFactory;

    protected $table = "capacidad";

    protected $fillable = [
        'cantidad', 'estado'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
