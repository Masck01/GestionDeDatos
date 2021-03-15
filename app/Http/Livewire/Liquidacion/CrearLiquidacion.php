<?php

namespace App\Http\Livewire\Liquidacion;

use Livewire\Component;
use App\Concepto;
use App\ConfiguracionCategoria;
use App\Categoria;
use App\Empleado;
use App\LineaLiquidacion;
use App\Liquidacion;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Collection;
use Schema;

class CrearLiquidacion extends Component
{
    public $id_empleado;
    public $empleado;
    public $conceptos;
    public $configuracion_categoria;
    public $categoria;
    public $salario_basico;
    public $total_retenciones;
    public $total_haberes;
    public $salario_neto;
    public $month;
    public $fecha;
    public $fecha_desde;
    public $fecha_hasta;
    public $periodo_liquidacion;
    public $linea_liquidacion;

    protected $rules = [
        'month' => 'required|date'
    ];

    public function mount($id_empleado)
    {
        $this->id_empleado = $id_empleado;
        $this->empleado = Empleado::find($id_empleado);
        $this->conceptos = Concepto::all();
        $this->categoria = Categoria::find($this->empleado->categoria_id);
        $this->configuracion_categoria = ConfiguracionCategoria::where('categoria_id', $this->categoria->id)
            ->get()->filter(fn ($con) => $con->concepto()->first()->estado === "Activo");
        $this->salario_basico = $this->categoria->salario_basico;
        $this->linea_liquidacion = $this->linea_liquidacion();
        $this->total_haberes = $this->calculo_haberes();
        $this->total_retenciones = $this->calculo_retencion();
        $this->salario_neto = $this->total_haberes - $this->total_retenciones;
    }

    public function hydrate()
    {
        $this->linea_liquidacion = $this->linea_liquidacion();
    }

    public function store()
    {
        $this->validate();
        $col_names_liquidacion = Schema::getColumnListing('liquidacion');
        $fecha_desde = $this->fecha->startOfMonth();
        $fecha_hasta = $this->fecha->endOfMonth();
        $periodo_liquidacion = $this->periodo_liquidacion;
        $retenciones = $this->total_retenciones;
        $salario_bruto = $this->salario_basico;
        $salario_neto = $this->salario_neto;
        $estado = 'pagado';
        $valores_liquidacion = collect(
            [
                $fecha_desde,
                $fecha_hasta,
                $salario_neto,
                $salario_bruto,
                $periodo_liquidacion,
                $retenciones,
                $estado,
                $this->id_empleado,
            ]
        );
        $valores_linealiquidacion = $this->valores_linealiquidacion();
        $atributo_valor_liquidacion = $this->atributo_valor_liquidacion($col_names_liquidacion, $valores_liquidacion);
        DB::transaction(function () use ($atributo_valor_liquidacion, $valores_linealiquidacion) {
            $liquidacion_id = Liquidacion::create($atributo_valor_liquidacion);
            $atributo_valor_linealiquidacion = $this->agregar_liquidacion_id($liquidacion_id->id, $valores_linealiquidacion);
            $liquidacion_id->linea_liquidacion()->createMany($atributo_valor_linealiquidacion);
            // $atributo_valor_linealiquidacion->each(fn ($arr, $val) => LineaLiquidacion::create($arr->toArray()));
        });
        return redirect()->route('liquidacion.index');
    }

    private function atributo_valor_liquidacion($col_names_liquidacion, $valores_liquidacion)
    {
        return collect($col_names_liquidacion)->diff([
            'created_at', 'id', 'updated_at'
        ])->combine($valores_liquidacion)->toArray();
    }

    private function agregar_liquidacion_id($liquidacion_id, $valores_linealiquidacion)
    {
        return $valores_linealiquidacion->map(fn ($val, $key) => collect($val)->union(['liquidacion_id' => $liquidacion_id]))->toArray();
    }

    private function valores_linealiquidacion()
    {
        return $this->configuracion_categoria
            // ->each(fn ($i) => $i->montofijo = $i->montofijo == null ? null : (float)$i->montofijo)
            // ->each(fn ($i) => $i->montovariable = $i->montovariable == null ? null : (float)$i->montovariable)
            ->map(fn ($i) => $i->only(['montofijo', 'montovariable', 'unidad', 'concepto_id']));
    }

    public function notify_fecha()
    {
        $this->fecha = Carbon::create($this->month);
        $this->fecha_desde = $this->fecha->startOfMonth()->format('d-m-Y');
        $this->fecha_hasta = $this->fecha->endOfMonth()->format('d-m-Y');
        $this->periodo_liquidacion = $this->fecha->monthName;
    }

    public function linea_liquidacion()
    {
        return $this->configuracion_categoria->map(function (ConfiguracionCategoria $config) {
            $config->montovariable = $config->hasFormula($config) ?? $config->montovariable;
            return $config;
        });
    }

    public function calculo_retencion()
    {
        return $this->configuracion_categoria
            ->filter(fn ($concepto) => $concepto->concepto()->first()->tipo == 'Retencion')
            ->map(fn ($config) => $config->montofijo + $config->montovariable)
            ->sum();
    }

    public function calculo_haberes()
    {
        return $this->configuracion_categoria
            ->filter(fn ($concepto) => $concepto->concepto()->first()->tipo == 'Haber')
            ->map(fn ($config) => $config->montofijo + $config->montovariable)
            ->sum();
    }

    public function render()
    {
        return view('livewire.liquidacion.crear-liquidacion')
            ->extends('layouts.app')
            ->section('content');
    }
}
