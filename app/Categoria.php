<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categoria";

    protected $fillable = [
        'descripcion','salario_basico','estado'
    ];
    
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
