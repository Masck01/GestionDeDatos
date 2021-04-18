<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;
use App\Proveedor;
use App\Producto;
use App\Detalle_Compra;
use App\Deposito;
use App\DepositoProducto;
use App\MovimientoDeposito;
use App\Caja;
use App\MovimientodeCaja;
use DB;
use Session;
use Carbon\Carbon;
use Validator;
use Response;
use App\HistorialMovimientos;
use Illuminate\Support\Collection;
use Luecano\NumeroALetras\NumeroALetras;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;


class ComprasController extends Controller
{
    public function index(Request $request){

        $compras = Compra::orderBy('id', 'DESC')->paginate(10);

        return view('admin.compras.index', compact('compras'));

    }

    public function create(){

        $cajas = Caja::find(1);


            $productos = Producto::all();

            $proveedores = Proveedor::orderBy('id', 'ASC')->get();

            return view('admin.compras.create',['productos'=> $productos,'proveedores'=>$proveedores]);

    }

    public function store(Request $request)
    {   $rules = [
        'idProveedor' => 'required_unless:tipoproveedor,Consumidor Final'

        ];
        $message = [



        'idProveedor' => 'Debe seleccionar un proveedor'
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()){
        return back()->withErrors($validator)->with('message', 'Se ha Producido un Error')->with('typealert', 'danger');
        }
        $cajas = Caja::find(1);

        if($cajas->estado == 'Activo'):

            try{

                DB::beginTransaction();

                $mytime = Carbon::now('America/Argentina/Tucuman');

                $compra = new Compra();

                $compra->proveedor_id = $request->get('idProveedor');
                /* $compra->usuario_id = Auth::user->id; */
                $compra->tipoproveedor = $request->tipoproveedor;
                $compra->fechaalta = $mytime->toDateTimeString();
                $compra->hora = $mytime->toDateTimeString();
                $compra->subtotalcompra = $request->get('subtotal_compra');
                $compra->ivacompra = $request->get('iva_compra');
                $compra->total = $request->get('total_compra');
                $compra->fechacompra = $request->fechacompra;
                $compra->nrofactura= $request->nrofactura;



                $compra->save();

                if (count( json_decode($request->productosEnCompra,true) ) > 0) {

                   $proEnPedido = json_decode($request->productosEnCompra,true);

                   for ($i=0; $i < count($proEnPedido); $i++) {

                        //CARGA LA LINEA DE PEDIDO
                        $detalle = new Detalle_Compra();

                        $detalle->compra_id = $compra->id;

                        $detalle->producto_id = $proEnPedido[$i]['idProducto'];



                        $detalle->cantidad = $proEnPedido[$i]['cantidad'];

                        $detalle->subtotal = $proEnPedido[$i]['precio'];


                        $detalle->save();

                        $producto = Producto::find($detalle->producto_id);

                        $producto->stock = $producto->stock +  $detalle->cantidad;

                        $producto->save();

                    }
                }

                //CREAR EL MOVIMIENTO EN CAJA//

                $this->crearLineaCaja($compra);

                DB::commit();
            }

            catch(Exception $e){


                DB::rollback();
            }

            return redirect()->route('compras.index')->with('success','Compra agregada correctamente');

        else:

            Session::flash('error', 'Error: No hay ninguna Caja Abierta');

            return back()->with('message','Ninguna Caja Abierta')->with('typealert','danger');

        endif;
    }

    private function crearLineaCaja(Compra $compra){

        $cajas = caja::find(1);

        $proveedor = Proveedor::find($compra->proveedor_id);

        $mytime = Carbon::now('America/Argentina/Tucuman');

        $cajas->saldo = $cajas->saldo - $compra->total;

        $cajas->save();

        $movimiento = new MovimientodeCaja();

        $movimiento->caja_id = 1;

        $movimiento->descripcion = '00'.$compra->proveedor_id."0"."-".'0000000'.$compra->id;

        $movimiento->fecha = $mytime->toDateTimeString();

        $movimiento->entrada = '0';

        $movimiento->salida =  $compra->ivacompra;

        $movimiento->moneda = 'Pesos';

        $movimiento->compra_id = $compra->id;

       /*  $movimiento->saldoparcialpesos =  $cajas->saldoPesos;

        $movimiento->saldoparcialdolares =  '0'; */

        $movimiento->save();
    }

    public function show($id)
    {
        $compra = Compra::find($id);

        $detalle = $compra->detalle_compra()->get();

        return view('admin.compras.show', ['compra'=>$compra,'detalle'=>$detalle]);
    }
    public function listadocompras()
    {
        $pedidos = Compra::orderBy('id', 'DESC')->get();

        $subtotalcompras = DB::table("compra")->get()->sum("subtotalcompra");
        $ivatotal = DB::table("compra")->get()->sum("ivacompra");
        $orders = DB::table("compra")->get()->sum("total");

        $pdf = PDF::loadView('pdf.compraspdf',['pedidos'=>$pedidos,'subtotalcompras'=>$subtotalcompras,'ivatotal'=>$ivatotal,'orders'=>$orders])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }


    public function libroCompra(Request $request){

        $from = $request->searchDate;

        $to = $request->searchDateHasta;

        if($from && $to){

            $compras = Compra::whereBetween('fechacompra', [$from, $to])
                           ->orderBy('id', 'DESC')
                           ->paginate(30);

            $total = Compra::select( DB::raw('sum(total) as totalCompra'))
                                           ->whereBetween('fechacompra', [$from, $to])
                                           ->firstOrFail();
        }
        else{

            $from = 0;

            $to = 0;

            $compras = Compra::orderBy('id', 'DESC')->paginate(15);

            $total = Compra::select( DB::raw('sum(total) as totalCompra'))
                                           ->firstOrFail();
        }

        return view('admin.compras.libroCompra', compact('compras','total','from','to'));
}
public function libroComprapdf($from,$to){

    if($from !=0 && $to !=0){

        $compras = Compra::whereBetween('fechacompra', [$from, $to])
                       ->orderBy('id', 'DESC')
                       ->paginate(30);

        $total = Compra::select( DB::raw('sum(total) as total_compra'))
                                       ->whereBetween('fechacompra', [$from, $to])
                                       ->firstOrFail();

        $from = Carbon::parse($from)->format('d/m/Y');

        $to = Carbon::parse($to)->format('d/m/Y');
    }
    else{

        $compras = Compra::orderBy('id', 'DESC')->paginate(15);

        $total = Compra::select( DB::raw('sum(total) as total_compra'))
                                       ->firstOrFail();
    }

    $pdf = PDF::loadView('pdf.libroCompra',compact('compras','total','from','to'))->setPaper('a4', 'landscape');

    return $pdf->stream();

}


}
