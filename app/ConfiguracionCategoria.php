<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionCategoria extends Model
{
    protected $table = "configuracioncategoria";

    protected $fillable = [
        'montofijo','montovariable','unidad','concepto_id','categoria_id'
    ];

    public function conceptos()
    {
        return $this->belongsTo(Concepto::class,'concepto_id','id');
    }

}
