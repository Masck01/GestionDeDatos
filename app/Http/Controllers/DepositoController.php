<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposito;
use App\DepositoProducto;
use App\Provincia;
use App\Producto;
use App\Pedido;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DepositoProductoExport;
use App\Imports\DepositoProductsImport;


class DepositoController extends Controller
{
    public function index(Request $request){
        
        $depositos = Deposito::orderBy('id', 'DESC')->paginate(10);
        
        return view('admin.deposito.index', compact('depositos'));

    }

    public function create()
    {

        $provincias = Provincia::orderBy('nombre', 'ASC')
                      ->select('nombre as nombre', 'id as id')
                      ->get();

        return view('admin.deposito.create',compact('provincias'));
    }

    public function listadoPedido($id){
        
        $pedidos = Pedido::where('deposito_id','like',$id)->get();
        
        return view('admin.deposito.pedidos', compact('pedidos'));

    }

    public function store(Request $request)
    {
        $deposito = new Deposito;
        $deposito->nombre = $request->nombre;
        $deposito->telefonos = $request->telefonos;
        $deposito->direccion = $request->direccion;
        $deposito->ciudad = $request->ciudad;
        $deposito->codigo_postal = $request->codigo_postal;
        $deposito->provincia_id = $request->provincia_id;
        $deposito->save();

        return redirect()->route('depositos.index');
    }

    public function show($id)
    {

        $deposito = Deposito::find($id);
        
        return view('admin.deposito.show', compact('deposito'));

    }

    public function edit($id)
    {

        $deposito = Deposito::find($id);

        $provincias = Provincia::orderBy('nombre', 'ASC')
        ->select('nombre as nombre', 'id as id')
        ->get();

        return view('admin.deposito.edit', compact('deposito','provincias'));

    }

    public function update(Request $request, $id)
    {

        $deposito = Deposito::find($id);
        $deposito->nombre = $request->nombre;
        $deposito->telefonos = $request->telefonos;
        $deposito->direccion = $request->direccion;
        $deposito->ciudad = $request->ciudad;
        $deposito->codigo_postal = $request->codigo_postal;
        $deposito->provincia_id = $request->provincia_id;
        $deposito->save();

        return redirect()->route('depositos.index')->with('success','Deposito actualizado correctamente');
    
    }

    public function destroy($id,$pedido)
    {
        $deposito = Deposito::find($id);
        $deposito->delete();
        return redirect()->route('depositos.index');
    }


    public function stock(Request $request)
    {
        $id = $request->idDepositoProducto;

        $depositoProducto = DepositoProducto::find($id);
        $depositoProducto->stock = $request->stockDisponibleUpdate;
        $depositoProducto->stock_critico = $request->stockCriticoUpdate;
        $depositoProducto->ubicacion = $request->ubicacionUpdate;
        $depositoProducto->save();

        return back();
    }

    public function exportProducto($id){
        return Excel::download(new DepositoProductoExport($id),
        'Productos_Deposito_Lista.xlsx');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');

        if($file == null){       
          return back()->with('message','Error, Ningun Archivo Cargado');
        }
        else{
         Excel::import(new DepositoProductsImport,$file);
         return back()->with('message','Importacion de Productos Terminada');          
        } 
        
    }

    public function agregarProductos(Request $request)
    {
        $deposito = new DepositoProducto;
        $deposito->stock = $request->stock;
        $deposito->stock_critico = $request->stockCritico;
        $deposito->ubicacion = $request->ubicacion;
        $deposito->producto_id = $request->idProducto;
        $deposito->deposito_id = $request->idDeposito;
        $deposito->save();

        return redirect()->route('depositos.index');
    }

    
}
