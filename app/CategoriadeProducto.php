<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriadeProducto extends Model
{
    use HasFactory;

    protected $table = 'categoriadeproducto';
    protected $fillable = [
        'nombre', 'estadocategoria'
    ];
}
