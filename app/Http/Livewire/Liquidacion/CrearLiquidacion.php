<?php

namespace App\Http\Livewire\Liquidacion;

use Livewire\Component;
use App\Concepto;
use App\ConfiguracionCategoria;
use App\Categoria;
use App\Empleado;
use App\Liquidacion;
use Carbon\Carbon;
use DB;
use Schema;
use Session;

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


    // Reglas
    protected $rules = [
        'month' => 'required|date',
    ];

    //Propiedades para nueva configuracion
    public $montofijo;
    public $montovariable;
    public $unidad;
    public $concepto_id = 1;
    public $nuevos_conceptos;
    public $seleccionar_concepto;


    public function mount($id_empleado)
    {
        $this->id_empleado = $id_empleado;
        $this->empleado = Empleado::find($id_empleado);
        $this->conceptos = Concepto::all();
        $this->categoria = Categoria::find($this->empleado->categoria_id);
        $this->configuracion_categoria = ConfiguracionCategoria::where('categoria_id', $this->categoria->id)
            ->get()->filter(fn ($con) => $con->concepto()->first()->estado === "Activo");
        $this->salario_basico = $this->categoria->salario_basico;
        $this->linea_liquidacion = $this->linea_liquidacion($this->configuracion_categoria);
        $this->total_haberes = $this->calculo_haberes($this->configuracion_categoria);
        $this->total_retenciones = $this->calculo_retencion($this->configuracion_categoria);
        $this->salario_neto = $this->salario_neto();
        $this->nuevos_conceptos = collect();
        $this->seleccionar_concepto = $this->conceptos->pluck('descripcion', 'id');
    }

    public function hydrate()
    {
        $this->linea_liquidacion = $this->linea_liquidacion($this->configuracion_categoria, $this->nuevos_conceptos);
    }

    public function updated()
    {
        if ($this->montofijo > 0 && $this->montovariable > 0) $this->montovariable = 0;
    }

    public function store()
    {
        $this->validate();
        $col_names_liquidacion = collect(Schema::getColumnListing('liquidacion'))->sort();
        $fecha_desde = $this->fecha->startOfMonth();
        $fecha_hasta = $this->fecha->endOfMonth();
        $periodo_liquidacion = $this->periodo_liquidacion;
        $retenciones = $this->total_retenciones + $this->calculo_retencion($this->nuevos_conceptos);
        $salario_bruto = $this->salario_basico;
        $salario_neto = $this->salario_neto;
        $estado = 'pagado';
        $valores_liquidacion = collect(
            [
                $this->id_empleado,
                $estado,
                $fecha_desde,
                $fecha_hasta,
                $periodo_liquidacion,
                $retenciones,
                $salario_bruto,
                $salario_neto,
            ]
        );
        $valores_linealiquidacion = $this->valores_linealiquidacion();
        $atributo_valor_liquidacion = $this->atributo_valor_liquidacion($col_names_liquidacion, $valores_liquidacion);
        DB::transaction(function () use ($atributo_valor_liquidacion, $valores_linealiquidacion) {
            $liquidacion_id = Liquidacion::create($atributo_valor_liquidacion);
            $atributo_valor_linealiquidacion = $this->agregar_liquidacion_id($liquidacion_id->id, $valores_linealiquidacion);
            $liquidacion_id->linea_liquidacion()->createMany($atributo_valor_linealiquidacion);
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
        return $valores_linealiquidacion->merge($this->nuevos_conceptos)->map(fn ($val, $key) => collect($val)->union(['liquidacion_id' => $liquidacion_id]))->toArray();
    }

    private function valores_linealiquidacion()
    {
        return $this->linea_liquidacion
            ->map(fn ($i) => $i->only(['montofijo', 'montovariable', 'unidad', 'concepto_id']));
    }

    public function notify_fecha()
    {
        $this->fecha = Carbon::create($this->month);
        $this->fecha_desde = $this->fecha->startOfMonth()->format('d-m-Y');
        $this->fecha_hasta = $this->fecha->endOfMonth()->format('d-m-Y');
        $this->periodo_liquidacion = $this->fecha->monthName;
    }

    public function linea_liquidacion($configuracion = null, $lista = null)
    {
        return ($configuracion ?? $lista)->map(function (ConfiguracionCategoria $config) {
            $config->montovariable = $config->hasFormula($config) ?? $config->montovariable;
            return $config;
        });
    }

    public function calculo_retencion($collection)
    {
        return gettype($collection->first()) == 'object' ? $collection
            ->filter(fn ($concepto) => $concepto->concepto()->first()->tipo == 'Retencion')
            ->map(fn ($config) => $config->montofijo + $config->montovariable)
            ->sum() :
            $collection->take(-1)->filter(fn ($concepto) => Concepto::findOrFail($concepto['concepto_id'])->tipo == 'Retencion')
            ->map(fn ($config) => ($config['montofijo'] + $config['montovariable']) * $config['unidad'])
            ->sum();
    }

    public function calculo_haberes($collection)
    {
        return gettype($collection->first()) == 'object' ? $collection
            ->filter(fn ($concepto) => $concepto->concepto()->first()->tipo == 'Haber')
            ->map(fn ($config) => $config->montofijo + $config->montovariable)
            ->sum() :
            $collection->take(-1)->filter(fn ($concepto) => Concepto::findOrFail($concepto['concepto_id'])->tipo == 'Haber')
            ->map(fn ($config) => ($config['montofijo'] + $config['montovariable']) * $config['unidad'])
            ->sum();
    }

    public function salario_neto()
    {
        return $this->total_haberes - $this->total_retenciones;
    }

    public function agregar_concepto()
    {
        $this->validate([
            'montofijo' => 'required_without:montovariable|min:1|nullable',
            'montovariable' => 'required_without:montofijo|between:1,100|max:100|nullable',
            'unidad' => 'required|numeric|between:1,100'
        ]);
        $this->nuevos_conceptos->push([
            'montofijo' => $this->montofijo,
            'montovariable' => $this->montovariable,
            'unidad' => $this->unidad,
            'concepto_id' => $this->concepto_id,
            'categoria_id' => $this->categoria->id,
        ]);
        Session::flash('concepto agregado', 'Se ha agregado el concepto ' . $this->conceptos->find($this->concepto_id)->descripcion);
        $this->total_retenciones += $this->calculo_retencion($this->nuevos_conceptos);
        $this->total_haberes += $this->calculo_haberes($this->nuevos_conceptos);
        $this->salario_neto = $this->salario_neto();
        $this->reset(['montofijo', 'montovariable', 'unidad', 'concepto_id']);
    }

    public function render()
    {
        return view('livewire.liquidacion.crear-liquidacion')
            ->extends('layouts.app')
            ->section('content');
    }
}
