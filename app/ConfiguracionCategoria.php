<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class ConfiguracionCategoria extends Model
{
    use HasFactory;

    protected $table = "configuracioncategoria";

    protected $fillable = [
        'montofijo', 'montovariable', 'unidad', 'concepto_id', 'categoria_id'
    ];

    public function concepto()
    {
        return $this->belongsTo(Concepto::class, 'concepto_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    public function hasFormula(ConfiguracionCategoria $configuracion)
    {
        $salario_basico = $configuracion->categoria()->first()->salario_basico;
        $montovariable = $configuracion->montovariable / 100;
        $fecha_ingreso = Carbon::create($configuracion->categoria()->first()->empleado()->first()->fecha_ingreso);
        $unidad = $configuracion->unidad;
        switch ($configuracion->concepto()->first()->descripcion) {
            case 'aporte jubilatorio':
                return $montovariable * $salario_basico * $unidad;
                break;

            case 'aguinaldo':
                return $montovariable * $salario_basico * $unidad;
                break;

            case 'antiguedad':
                $antiguedad = intval($fecha_ingreso->diffInMonths(today()) / 12);
                if ($antiguedad !== 0) return $montovariable * $salario_basico * $antiguedad * $unidad;
                break;

            case 'obra social':
                return $montovariable * $salario_basico * $unidad;
                break;

            case 'descuento afip':
                return $montovariable * $salario_basico * $unidad;
                break;

            case 'inasistencias':
                return $salario_basico/now()->daysInMonth * $unidad;
                break;

            case 'grupo familiar':
                return $montovariable * $salario_basico * $unidad;
                break;

            default:
                break;
        }
    }
}
