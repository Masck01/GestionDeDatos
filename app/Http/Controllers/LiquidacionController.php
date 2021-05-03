<?php

namespace App\Http\Controllers;

use App\Concepto;
use App\Liquidacion;
use Luecano\NumeroALetras\NumeroALetras;
use Barryvdh\DomPDF\Facade as PDF;
use App\Empleado;
use App\ConfiguracionCategoria;
use App\Categoria;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LiquidacionController extends Controller
{
    public function index()
    {
        $meses = [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
        ];

        $liquidacion = Liquidacion::join('empleado', 'empleado.id', '=', 'liquidacion.empleado_id')->select('liquidacion.*', 'empleado.apellido', 'empleado.nombre')->paginate(10);

        return view('admin.liquidacion.index', compact('liquidacion','meses'));
    }

    public function create()
    {
    }

    public function store(Request $req)
    {
        $empleados = Empleado::all();
        foreach ($empleados as $emp) {
            $emp->id;
            $conceptos = Concepto::all();
            $categoria = Categoria::find($emp->categoria_id);
            $configuracion_categoria = ConfiguracionCategoria::where('categoria_id', $categoria->id)
                ->get()->filter(fn ($con) => $con->concepto()->first()->estado === "Activo");
            $salario_basico = $categoria->salario_basico;
            $linea_liquidacion = $this->linea_liquidacion($configuracion_categoria);
            $total_haberes = $this->calculo_haberes($configuracion_categoria);
            $total_retenciones = $this->calculo_retencion($configuracion_categoria);
            $salario_neto = $total_haberes - $total_retenciones;
            $col_names_liquidacion = collect(Schema::getColumnListing('liquidacion'))->sort();
            $fecha_desde = now()->startOfMonth();
            $fecha_hasta = now()->endOfMonth();
            $periodo_liquidacion = now()->monthName;
            $estado = 'pagado';
            $valores_liquidacion = collect(
                [
                    $emp->id,
                    $estado,
                    $fecha_desde,
                    $fecha_hasta,
                    $periodo_liquidacion,
                    $total_retenciones,
                    $salario_basico,
                    $salario_neto,
                ]
            );
            $valores_linealiquidacion = $this->valores_linealiquidacion($linea_liquidacion);
            $atributo_valor_liquidacion = $this->atributo_valor_liquidacion($col_names_liquidacion, $valores_liquidacion);
            // dd($valores_liquidacion, $valores_linealiquidacion);
            DB::transaction(function () use ($atributo_valor_liquidacion, $valores_linealiquidacion) {
                $liquidacion_id = Liquidacion::create($atributo_valor_liquidacion);
                $atributo_valor_linealiquidacion = $this->agregar_liquidacion_id($liquidacion_id->id, $valores_linealiquidacion);
                $liquidacion_id->linea_liquidacion()->createMany($atributo_valor_linealiquidacion);
            });
        }
        return redirect()->route('liquidacion.index');
    }

    public function lista_liquidacion($id)
    {
        $numaletra = new NumeroALetras();

        $liquidacion = Liquidacion::findOrFail($id);

        $linea_liquidacion = $liquidacion->linea_liquidacion()->get();

        $empleado = $liquidacion->empleado()->get()->first();

        $conceptos = Concepto::all();

        $salario_basico = $empleado->categoria()->get()->first()->salario_basico;

        return compact('liquidacion', 'linea_liquidacion', 'empleado', 'conceptos', 'salario_basico', 'numaletra');
    }


    public function show($id)
    {
        return view('admin.liquidacion.show', $this->lista_liquidacion($id));
    }

    public function recibo($id)
    {
        return PDF::loadView('pdf.reciboSueldo', $this->lista_liquidacion($id))->setPaper('a4')->stream();
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

    private function valores_linealiquidacion($linea_liquidacion)
    {
        return $linea_liquidacion
            ->map(fn ($i) => $i->only(['montofijo', 'montovariable', 'unidad', 'concepto_id']));
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
}
