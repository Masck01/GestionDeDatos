<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concepto;
use App\Detalle_Liquidacion;
use App\Liquidacion;
use App\Cajas;
use App\Categoria;
use App\ConfiguracionCategoria;
use App\Empleado;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Luecano\NumeroALetras\NumeroALetras;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;


class LiquidacionController extends Controller
{
    public function index()
    {

        $liquidacion = Liquidacion::join('empleado', 'empleado.id', '=', 'liquidacion.empleado_id')->select('liquidacion.*', 'empleado.apellido', 'empleado.nombre')->paginate(10);

        return view('admin.liquidacion.index', compact('liquidacion'));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function lista_liquidacion($id)
    {
        $numaletra = new NumeroALetras();

        $liquidacion = Liquidacion::findOrFail($id);

        $linea_liquidacion = $liquidacion->linea_liquidacion()->get();

        $empleado = $liquidacion->empleado()->get()->first();

        $conceptos = Concepto::all();

        $salario_basico = $empleado->categoria()->get()->first()->salario_basico;

        return compact('liquidacion', 'linea_liquidacion', 'empleado', 'conceptos', 'salario_basico','numaletra');
    }


    public function show($id)
    {
        return view('admin.liquidacion.show', $this->lista_liquidacion($id));
    }

    public function recibo($id)
    {
        return PDF::loadView('pdf.reciboSueldo', $this->lista_liquidacion($id))->setPaper('a4')->stream();
    }
}
