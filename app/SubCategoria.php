<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = "subcategoria";

    protected $fillable = [
        'nombre','categoria_id','estado'
    ];
    
    public function categoria()
    {
        return $this->hasOne(Categoria::class,'id','categoria_id');
    }

}
