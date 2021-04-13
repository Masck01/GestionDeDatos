<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Cliente;
use App\Producto;
use App\Linea_Venta;
use App\Caja;
use App\Pago;
use App\MovimientoCaja;
use App\MovimientodeCaja;
use App\Proveedor;
use DB;
use Session;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Validator;
use Barryvdh\DomPDF\Facade as PDF;
use App\Empleado;

class VentaController extends Controller
{
    public function index(Request $request){

        $ventas = Venta::orderBy('id', 'DESC')->paginate(10);

        return view('admin.ventas.index', compact('ventas'));

    }

    public function create(){

        $cajas = Caja::find(1);


        if($cajas->estado == 'Activo'):

            $productos = Producto::orderBy('nombre','ASC')->get();


            $clientes = Cliente::orderBy('id', 'ASC')->get();

            return view('admin.ventas.create',["productos"=>$productos, "clientes"=>$clientes]);

        else:

            Session::flash('error', 'Error: No hay ninguna Caja Abierta');

            return back()->with('message','Ninguna Caja Abierta')->with('typealert','danger');

        endif;

    }

    public function store(Request $request)
    {   $rules = [
        'idCliente' => 'required_unless:tipocliente,Consumidor Final'

        ];
        $message = [



        'idCliente' => 'Debe seleccionar un cliente'
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()){
        return back()->withErrors($validator)->with('message', 'Se ha Producido un Error')->with('typealert', 'danger');
        }

        $mytime = Carbon::now('America/Argentina/Tucuman');

        $cajas = Caja::find(1);

        $distinto = false;

        if($cajas->estado == 'Activo'):

            try{

                DB::beginTransaction();

                $mytime = Carbon::now('America/Argentina/Tucuman');

                $venta = new Venta();

                $venta->empleado_id = Auth::user()->id;

                $venta->cliente_id = $request->get('idCliente');

                $venta->fecha = $mytime->toDateTimeString();

                $venta->hora = $mytime->toDateTimeString();
                $venta->subtotalventa = $request->get('subtotal_venta');
                $venta->iva = $request->get('iva_venta');
                $venta->total = $request->get('total_venta');
                $venta->tipocliente = $request->tipocliente;
                $venta->estado = "Impago";

                $venta->save();

            if (count( json_decode($request->productosEnPedidos,true) ) > 0) {

                   $proEnPedido = json_decode($request->productosEnPedidos,true);

                   for ($i=0; $i < count($proEnPedido); $i++) {

                        //CARGA LA LINEA DE PEDIDO
                        $linea = new Linea_Venta();
                        $linea->venta_id = $venta->id;
                        $linea->producto_id = $proEnPedido[$i]['idProducto'];
                        $linea->cantidad = $proEnPedido[$i]['cantidad'];
                        $linea->subtotal = $proEnPedido[$i]['precio'];
                        $linea->save();

                        $producto = Producto::find($linea->producto_id);
                        $producto->stock = $producto->stock - $linea->cantidad;
                        $producto->save();

                    }
                }

                $this->crearLineaCaja($venta);

                DB::commit();
            }

            catch(Exception $e){


                DB::rollback();
            }

            return redirect()->route('ventas.index')->with('success','Presupuesto agregado correctamente');

        else:

            Session::flash('error', 'Error: No hay ninguna Caja activa');

            return back()->with('message','Ninguna Caja activa')->with('typealert','danger');

        endif;



    }

    public function show($id)
    {
        $pedido = Venta::find($id);

        $detalle = $pedido->detalle_pedido()->get();

        return view('admin.ventas.show', ['pedido'=>$pedido,'detalle'=>$detalle]);
    }

    public function listadoventas()
    {
        $pedidos = Venta::orderBy('id', 'DESC')->get();

        $subtotalventas = DB::table("venta")->get()->sum("subtotalventa");
        $ivatotal = DB::table("venta")->get()->sum("iva");
        $orders = DB::table("venta")->get()->sum("total");

        $pdf = PDF::loadView('pdf.pedidospdf',['pedidos'=>$pedidos,'subtotalventas'=>$subtotalventas,'ivatotal'=>$ivatotal,'orders'=>$orders])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function recivo ($id)
    {
        $pedido = Venta::find($id);;

        $detalle = $pedido->detalle_pedido()->get();

        if($pedido->tipocliente == 'Consumidor Final'):
        $pdf = PDF::loadView('pdf.reciboVentaCF',['pedido'=>$pedido],['detalle'=>$detalle])->setPaper('a4', 'landscape');

        return $pdf->stream();
        else:
        $pdf = PDF::loadView('pdf.reciboVenta',['pedido'=>$pedido],['detalle'=>$detalle])->setPaper('a4', 'landscape');
        return $pdf->stream();
        endif;
    }

    private function crearLineaCaja(Venta $pedido){

        $cajas = caja::find(1);

        $mytime = Carbon::now('America/Argentina/Tucuman');

        $cajas->saldo = $cajas->saldo + $pedido->total;

        $cajas->save();

        $movimiento = new MovimientodeCaja();

        $movimiento->caja_id = 1;

        $movimiento->descripcion = 'PV0'.$pedido->empleado_id."-".'0000000'.$pedido->id;

        $movimiento->fecha = $mytime->toDateTimeString();

        $movimiento->entrada = $pedido->total;

        $movimiento->salida =  '0';

        $movimiento->moneda = 'Pesos';

        $movimiento->venta_id=$pedido->id;

        $movimiento->save();
    }

    public function pagarVenta($id){

        $pedido = Venta::find($id);

        $detalle = $pedido->detalle_pedido()->get();

        return view('admin.ventas.pago', ['pedido'=>$pedido,'detalle'=>$detalle]);
    }

    public function guardarPago(Request $request)
    {
        $pago = new Pago();

        $pago->venta_id = $request->venta_id;

        $pago->monto = $request->venta_id;

        $pago->vuelto =  $request->vuelto;

        $pago->save();

        $venta = Venta::find($request->venta_id);

        $venta->estado = "Pagado";

        $venta->save();

        return redirect()->route('ventas.index');
    }

    public function libroVenta(Request $request){

        $from = $request->searchDate;

        $to = $request->searchDateHasta;

        if($from && $to){

            $ventas = Venta::where('estado','like','Pagado')
                           ->whereBetween('fecha', [$from, $to])
                           ->orderBy('id', 'DESC')
                           ->paginate(30);

            $total = Venta::select( DB::raw('sum(total) as totalVenta'))
                                           ->where('estado','like','Pagado')
                                           ->whereBetween('fecha', [$from, $to])
                                           ->firstOrFail();
        }
        else{

            $from = 0;

            $to = 0;

            $ventas = Venta::where('estado','like','Pagado')->orderBy('id', 'DESC')->paginate(15);

            $total = Venta::select( DB::raw('sum(total) as totalVenta'))
                                           ->where('estado','like','Pagado')
                                           ->firstOrFail();
        }

        return view('admin.ventas.libroVenta', compact('ventas','total','from','to'));
}
public function libroVentapdf($from,$to){

    if($from !=0 && $to !=0){

        $ventas = Venta::where('estado','like','Pagado')
                       ->whereBetween('fecha', [$from, $to])
                       ->orderBy('id', 'DESC')
                       ->paginate(30);

        $total = Venta::select( DB::raw('sum(total) as total_venta'))
                                       ->where('estado','like','Pagado')
                                       ->whereBetween('fecha', [$from, $to])
                                       ->firstOrFail();

        $from = Carbon::parse($from)->format('d/m/Y');

        $to = Carbon::parse($to)->format('d/m/Y');
    }
    else{

        $ventas = Venta::where('estado','like','Pagado')->orderBy('id', 'DESC')->paginate(15);

        $total = Venta::select( DB::raw('sum(total) as total_venta'))
                                       ->where('estado','like','Pagado')
                                       ->firstOrFail();
    }

    $pdf = PDF::loadView('pdf.libroVenta',compact('ventas','total','from','to'))->setPaper('a4', 'landscape');

    return $pdf->stream();

}


}
