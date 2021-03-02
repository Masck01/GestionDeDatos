<?php

namespace App\Http\Controllers;

use App\AlmacenDeMedicamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Producto;
use App\Deposito;
use App\SubCategoria;
use App\Proveedor;
use App\Marca;
use App\Capacidad;
use App\CategoriadeProducto;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Sucursal;
use Validator;
use Str;
use Session;
use Config;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::orderBy('nombre', 'ASC')->paginate(10);

        $total = Producto::count();

        return view('admin.productos.index', compact('productos','total'));
    }


    public function create()
    {
        $almacen = AlmacenDeMedicamentos::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        $proveedor = Proveedor::orderBy('razon_social', 'ASC')->pluck('razon_social', 'id');

        $marcas = Marca::where('estado','like','Activo')->pluck('nombre','id');

        $categorias = CategoriadeProducto::where('estadocategoria','like','Activo')->pluck('nombre', 'id');

        $capacidad = Capacidad::where('estado','like','Activo')->pluck('cantidad', 'id');

        return view('admin.productos.create', compact('categorias','marcas','almacen','proveedor','capacidad'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|max:255',

            'descripcion' => 'required',
        ];

        $message = [

            'nombre.requiered' => 'Ingrese Nombre de la Categoria',

            'nombre.max' =>'El nombre del producto no puede ser mayor a :max caracteres.',

            'descripcion.requiered' => 'Ingrese Descripcion del Producto',
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha Producido un Error, No se Pudo Registrar el Producto')->with('typealert','danger');

        else:

            if($request->hasFile('img'))
            {
                $file = $request->file('img');

                $fileExt = trim($request->file('img')->getClientOriginalExtension());

                $name = Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName()));

                $fileName = rand(1,9999).'-'.$name.'.'.$fileExt;

                $destino = public_path('img/productos');

                $request->img->move($destino,$fileName);

            }

            $producto = new Producto();

            $producto->nombre = $request->nombre;

            $producto->categoria_id = $request->categoria;

            $producto->marca_id = $request->marca;

            $producto->proveedor_id = $request->proveedor_id;

            $producto->almacen_id = $request->almacen_id;

            $producto->descripcion = $request->descripcion;

            $producto->imagen = $fileName;

            $producto->precio_venta = $request->precio_venta;

            $producto->precio_compra =   $request->precio_compra;

            $producto->stock = $request->stock;

            $producto->capacidad_id = $request->capacidad_id;

            $producto->fecha_vencimiento = $request->fecha_vencimiento;

            $producto->save();

            return redirect()->route('productos.index')->with('message','Producto Registrado Correctamente');

        endif;
    }

    public function show($id)
    {
        $producto = Producto::findorfail($id);

        return view('admin.productos.show', compact('producto'));

    }

    public function edit($id)
    {
        $producto = Producto::findorfail($id);

        $almacen = Deposito::orderBy('nombre','ASC')->get();

        $proveedor = Proveedor::orderBy('razon_social', 'ASC')->get();

        $marcas = Marca::where('estado','like','Activo')->get();

        $categorias = SubCategoria::where('estado','like','Activo')->get();

        $capacidad = Capacidad::where('estado','like','Activo')->get();

        return view('admin.productos.edit', compact('producto','categorias','marcas','almacen','proveedor','capacidad'));
    }


    public function update(Request $request, $id)
    {
        $rules = [

            'nombre' => 'required|max:255',
            'descripcion' => 'required',
        ];

        $message = [

            'nombre.required' => 'Ingrese Nombre de la Categoria',

            'nombre.max' =>'El nombre del producto no puede ser mayor a :max caracteres.',
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha Producido un Error, No se Pudo Registrar el Producto')->with('typealert','danger');

        else:

            $producto = Producto::find($id);

            if($request->hasFile('img'))
            {
                $file = $request->file('img');

                $fileExt = trim($request->file('img')->getClientOriginalExtension());

                $name = Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName()));

                $fileName = rand(1,9999).'-'.$name.'.'.$fileExt;

                $destino = public_path('img/productos');

                $request->img->move($destino,$fileName);

                $producto->imagen = $fileName;

            }

            $producto->nombre = $request->nombre;

            $producto->categoria_id = $request->categoria;

            $producto->marca_id = $request->marcas_id;

            $producto->proveedor_id = $request->proveedor_id;

            $producto->almacen_id = $request->almacen_id;

            $producto->descripcion = $request->descripcion;

            $producto->precio_venta = $request->precio_venta;

            $producto->precio_compra =   $request->precio_compra;

            $producto->stock = $request->stock;

            $producto->capacidad_id = $request->capacidad_id;

            $producto->fecha_vencimiento = $request->fecha_vencimiento;

            $producto->save();

            return redirect()->route('productos.index')->with('message','Producto Actualizado Correctamente');

        endif;
    }

    public function cargar()
    {
        return view('admin.productos.importarExcel');
    }

    public function exportExcel(){

        return excel::download(new ProductsExport,'Productos-Lista.xlsx');

    }

    public function listadoProductos()
    {
        $productos = Producto::orderBy('nombre', 'ASC')->get();

        $pdf = PDF::loadView('pdf.productospdf',['productos'=>$productos])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

}
