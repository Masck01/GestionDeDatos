<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;
use App\Proveedor;
use App\Producto;
use App\Concepto;
use App\Detalle_Liquidacion;
use App\Deposito;
use App\Usuario;
use App\Categoria;
use App\Liquidacion;
use App\DepositoProducto;
use App\MovimientoDeposito;
use App\Cajas;
use App\MovimientoCaja;
use App\ConfiguracionCategoria;
use DB;
use Session;
use Carbon\Carbon;
use Response;
use App\HistorialMovimientos;
use Illuminate\Support\Collection;
use Luecano\NumeroALetras\NumeroALetras;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;


class LiquidacionController extends Controller
{
    public function index(Request $request){

        $liquidacion = Liquidacion::orderBy('id', 'DESC')->paginate(10);

        return view('admin.liquidacion.index', compact('liquidacion'));

    }

    public function create($id){

            $usuarios = Usuario::findOrFail($id);

            $conceptos = ConfiguracionCategoria::where('categoria_id','=',$usuarios->categoria_id)->get();

            $haberes = ConfiguracionCategoria::where('categoria_id','=',$usuarios->categoria_id)->sum('montoFijo');

            $cuenta = ConfiguracionCategoria::where('categoria_id','=',$usuarios->categoria_id)->sum('montoVariable');

            $basico = Concepto::join('categorias_conceptos','conceptos.id','=','categorias_conceptos.concepto_id')
            ->select('categorias_conceptos.montoFijo AS monto')
            ->where('conceptos.descripcion','like','Basico')
            ->where('categorias_conceptos.categoria_id','=',$usuarios->categoria_id)->first();

            $antiguedad = Concepto::join('categorias_conceptos','conceptos.id','=','categorias_conceptos.concepto_id')
            ->select('categorias_conceptos.montoFijo AS monto')
            ->where('conceptos.descripcion','like','Antiguedad')
            ->where('categorias_conceptos.categoria_id','=',$usuarios->categoria_id)->first();

            list($ano,$mes,$dia) = explode("-",$usuarios->fechaIngreso);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
              $ano_diferencia--;

            $antiguedadTotal = $ano_diferencia * $antiguedad->monto;

            $haberest = $haberes + $antiguedadTotal;

            $retenciones = $cuenta * $basico->monto;

            $collection = collect($conceptos);

            return view('admin.liquidacion.create',['conceptos'=> $conceptos,'usuarios'=>$usuarios,'haberest'=>$haberest,'retenciones'=>$retenciones,'collection'=>$collection,'$ano_diferencia'=>$ano_diferencia]);

    }

    public function store(Request $request)
    {
        $cajas = Cajas::find(1);

        if($cajas->estado == 'abierta'):

            try{

                $mytime = Carbon::now('America/Argentina/Tucuman');

                $fecha = $mytime->toDateTimeString();

                DB::beginTransaction();

                $mytime = Carbon::now('America/Argentina/Tucuman');

                $liquidacion = new Liquidacion();

                $liquidacion->usuario_id = $request->get('empleado_id');

                $liquidacion->fechaDesde = $request->get('fechaDesde');

                $liquidacion->fechaHasta = $request->get('fechaHasta');

                $liquidacion->periodo = $request->get('periodo');

                $liquidacion->salarioNeto = $request->get('neto');

                $liquidacion->salarioBruto = $request->get('bruto');

                $liquidacion->retenciones = $request->get('retencion');

                $liquidacion->save();

                $usuario = Usuario::findOrFail($request->get('empleado_id'));

                list($ano,$mes,$dia) = explode("-",$usuario->fechaIngreso);

                $ano_diferencia  = date("Y") - $ano;

                $mes_diferencia = date("m") - $mes;

                $dia_diferencia   = date("d") - $dia;

                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                  $ano_diferencia--;

               if (count( json_decode($request->productosEnPedidos,true) ) > 0) {

                  $proEnPedido = json_decode($request->productosEnPedidos,true);

                  for ($i=0; $i < count($proEnPedido); $i++) {

                      $detalle = new Detalle_Liquidacion();

                      $detalle->liquidacion_id = $liquidacion->id;

                      $detalle->concepto_id =  $proEnPedido[$i]['concepto_id'];

                      $concepto = Concepto::find($detalle->concepto_id);

                      if($concepto->descripcion == 'Antiguedad')
                      {
                        $detalle->cantidad =  $ano_diferencia;
                      }
                      else{
                        $detalle->cantidad = $proEnPedido[$i]['unidad'];
                      }

                      if($concepto->descripcion == 'Antiguedad')
                      {
                        $detalle->montoFijo =  $ano_diferencia * $proEnPedido[$i]['montoFijo'];
                      }
                      else{
                        $detalle->montoFijo = $proEnPedido[$i]['montoFijo'];
                      }

                      $detalle->montoVariable = $proEnPedido[$i]['montoVariable'];

                      $detalle->save();

                  }
              }



                DB::commit();
            }

            catch(Exception $e){


                DB::rollback();
            }



            return redirect()->route('liquidacion.lista',$usuario->categoria_id);

        else:

            Session::flash('error', 'Error: No hay ninguna Caja Abierta');

            return back()->with('message','Ninguna Caja Abierta')->with('typealert','danger');

        endif;
    }


    public function show($id)
    {
        $liquidacion = Liquidacion::find($id);

        $detalle = $liquidacion->detalle_liquidacion()->get();

        $usuario= Usuario::findOrFail($liquidacion->usuario_id);

        $basico = Concepto::join('categorias_conceptos','conceptos.id','=','categorias_conceptos.concepto_id')
        ->select('categorias_conceptos.montoFijo AS monto')
        ->where('conceptos.descripcion','like','Basico')
        ->where('categorias_conceptos.categoria_id','=',$usuario->categoria_id)->first();

        list($ano,$mes,$dia) = explode("-",$usuario->fechaIngreso);

        $ano_diferencia  = date("Y") - $ano;

        $mes_diferencia = date("m") - $mes;

        $dia_diferencia   = date("d") - $dia;

        if ($dia_diferencia < 0 || $mes_diferencia < 0)
          $ano_diferencia--;

        return view('admin.liquidacion.show', ['liquidacion'=>$liquidacion,'detalle'=>$detalle,'basico'=>$basico,'ano_diferencia'=>$ano_diferencia]);
    }

    public function recivo ($id)
    {
        $liquidacion = Liquidacion::find($id);

        $detalle = $liquidacion->detalle_liquidacion()->get();

        $usuario= User::findOrFail($liquidacion->usuario_id);

        $basico = Concepto::join('categorias_conceptos','conceptos.id','=','categorias_conceptos.concepto_id')
        ->select('categorias_conceptos.montoFijo AS monto')
        ->where('conceptos.descripcion','like','Basico')
        ->where('categorias_conceptos.categoria_id','=',$usuario->categoria_id)->first();


        $pdf = PDF::loadView('pdf.reciboSueldo',['liquidacion'=>$liquidacion,'detalle'=>$detalle,'basico'=>$basico])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function list($id){

        $categoria = Categoria::find($id);

        $usuarios = Usuario::where('empleado_id','=',$id)->orderBy('username', 'ASC')->paginate(10);

        return view('admin.liquidacion.listUser', compact('usuarios','categoria'));

    }


}
