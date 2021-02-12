<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaConcepto extends Model
{
    protected $table = "configuracioncategoria";

    protected $fillable = [
        'categoria_id','concepto_id','montoFijo','montoVariable'
    ];

    public function conceptos()
    {
        return $this->belongsTo(Concepto::class,'concepto_id','id');
    }

    
    public function calcular($monto,$categoria_id)
    {
        $basico = Concepto::join('configuracioncategoria','conceptos.id','=','configuracioncategoria.concepto_id')
        ->select('configuracioncategoria.montoFijo AS monto')
        ->where('conceptos.descripcion','like','Basico')
        ->where('configuracioncategoria.categoria_id','=',$categoria_id)->first();
       
        return $total = $monto * $basico->monto;
    }

    public function calcularAntiguedad($fechaIngreso){

            list($ano,$mes,$dia) = explode("-",$fechaIngreso);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
              $ano_diferencia--;
            return $ano_diferencia;
    }
    
}
