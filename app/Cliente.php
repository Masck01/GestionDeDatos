<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Unidad_Negocio;
use App\Cede;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = [
      'nombre_Fantasia','razon_Social','cuit_cuil', 'telefonos', 'email', 'direccion', 'ciudad', 'codigo_postal', 'genero', 'tipo', 'provincia_id', 'rubro_id'
    ];

    public function rubro()
    {
        return $this->belongsTo(Rubro::class);
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    public function unidades_negocios()
    {
        return $this->belongsToMany(Unidad_Negocio::class,'clientes_unidad_negocio','cliente_id','unidadnegocio_id');
    }

    /////////////////////////////////////

    public function cedes()
    {
        return $this->hasMany(Cede::class,'cliente_id','id');
    }
}
