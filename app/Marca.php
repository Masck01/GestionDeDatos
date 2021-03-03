<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = "marca";

    protected $fillable = [
        'codigo', 'nombre', 'estado'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
