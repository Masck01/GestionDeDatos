<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;
use App\Proveedor;
use App\Producto;
use App\Concepto;
use App\Detalle_Liquidacion;
use App\Deposito;
use App\User;
use App\Liquidacion;
use App\DepositoProducto;
use App\MovimientoDeposito;
use App\Cajas;
use App\MovimientoCaja;
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

    public function create(){

            $conceptos = Concepto::all();
    
            $usuarios = User::orderBy('id', 'ASC')->paginate(5);

            return view('admin.liquidacion.create',['conceptos'=> $conceptos,'usuarios'=>$usuarios]);
        
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
                                
                $liquidacion->usuario_id = $request->get('usuario_id');
                                                
                $liquidacion->fechaDesde = '1/' . date("n", strtotime($fecha)) . '/2020';
 
                $liquidacion->fechaHasta = '30/' . date("n", strtotime($fecha))  . '/2020';

                $liquidacion->periodo = '10/20';
                
                $liquidacion->salarioNeto = $request->get('total_h');

                $liquidacion->salarioBruto = $request->get('total_n');

                $liquidacion->retenciones = $request->get('total_retencion');
                
                $liquidacion->save();
    
                if (count( json_decode($request->productosEnCompra,true) ) > 0) {
    
                   $proEnPedido = json_decode($request->productosEnCompra,true);
                    
                   for ($i=0; $i < count($proEnPedido); $i++) { 
                       
                       $detalle = new Detalle_Liquidacion();
                        
                       $detalle->liquidacion_id = $liquidacion->id;

                       $detalle->concepto_id =  $proEnPedido[$i]['idProducto'];
                        
                       $detalle->unidad = $proEnPedido[$i]['unidad'];
                        
                       $detalle->haberes = $proEnPedido[$i]['haberes'];
                        
                       $detalle->save();

                            
                   }
               }

          
                DB::commit();
            }
    
            catch(Exception $e){
            
            
                DB::rollback();
            }
    
            return redirect()->route('liquidacion.index')->with('success','Presupuesto agregado correctamente');
        
        else:

            Session::flash('error', 'Error: No hay ninguna Caja Abierta');

            return back()->with('message','Ninguna Caja Abierta')->with('typealert','danger');
        
        endif;
    }


    public function show($id)
    {
        $liquidacion = Liquidacion::find($id);

        $detalle = $liquidacion->detalle_liquidacion()->get();
   
        return view('admin.liquidacion.show', ['liquidacion'=>$liquidacion,'detalle'=>$detalle]);
    }

    public function recivo ($id)
    {
        $liquidacion = Liquidacion::find($id);

        $detalle = $liquidacion->detalle_liquidacion()->get();

        $pdf = PDF::loadView('pdf.reciboSueldo',['liquidacion'=>$liquidacion,'detalle'=>$detalle])->setPaper('a4', 'landscape');
    
        return $pdf->stream();
    }


}
