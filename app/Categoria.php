<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categoria";

    protected $fillable = [
        'descripcion','salario_basico','estado'
    ];

    public function empleado()
    {
        return $this->hasMany(Empleado::class);
    }
}
