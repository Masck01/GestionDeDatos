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
use Barryvdh\DomPDF\Facade as PDF;

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

            //$clientes = Cliente::orderBy('id', 'ASC')->get();

            return view('admin.ventas.create',["productos"=>$productos]);

        else:

            Session::flash('error', 'Error: No hay ninguna Caja Abierta');

            return back()->with('message','Ninguna Caja Abierta')->with('typealert','danger');

        endif;

    }

    public function store(Request $request)
    {
        $mytime = Carbon::now('America/Argentina/Tucuman');

        $cajas = Caja::find(1);

        $distinto = false;

        if($cajas->estado == 'Activo'):

            try{

                DB::beginTransaction();

                $mytime = Carbon::now('America/Argentina/Tucuman');

                $venta = new Venta();

                $venta->empleado_id = Auth::user()->id;

                $venta->fecha = $mytime->toDateTimeString();

                $venta->hora = $mytime->toDateTimeString();
                $venta->subtotal = $request->get('subtotal_venta');
                $venta->iva = $request->get('iva_venta');
                $venta->total = $request->get('total_venta');


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

        $orders = DB::table("venta")->get()->sum("total");

        $pdf = PDF::loadView('pdf.pedidospdf',['pedidos'=>$pedidos,'orders'=>$orders])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function recivo ($id)
    {
        $pedido = Venta::find($id);;

        $detalle = $pedido->detalle_pedido()->get();

        $pdf = PDF::loadView('pdf.reciboVenta',['pedido'=>$pedido],['detalle'=>$detalle])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    private function crearLineaCaja(Venta $pedido){

        $cajas = caja::find(1);

        $mytime = Carbon::now('America/Argentina/Tucuman');

        $cajas->saldo = $cajas->saldo + $pedido->total;

        $cajas->save();

        $movimiento = new MovimientodeCaja();

        $movimiento->caja_id = 1;

        $movimiento->descripcion = 'Venta Nº '. date("Ymd-his");

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

}
