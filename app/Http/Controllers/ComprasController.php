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
use Response;
use App\HistorialMovimientos;
use Illuminate\Support\Collection;
use Luecano\NumeroALetras\NumeroALetras;
use Illuminate\Support\Facades\Auth;


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
    {
        $cajas = Caja::find(1);

        if($cajas->estado == 'Activo'):

            try{

                DB::beginTransaction();

                $mytime = Carbon::now('America/Argentina/Tucuman');

                $compra = new Compra();

                $compra->proveedor_id = $request->get('idProveedor');

                /* $compra->usuario_id = Auth::user->id; */

                $compra->fecha = $mytime->toDateTimeString();

                $compra->hora = $mytime->toDateTimeString();

                $compra->total = $request->get('total_compra');

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

        $movimiento->descripcion = 'Compra de Productos a '. $proveedor->nombre;

        $movimiento->fecha = $mytime->toDateTimeString();

        $movimiento->entrada = '0';

        $movimiento->salida =  $compra->total;

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



}
