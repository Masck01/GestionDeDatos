<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaEmpleado;
use App\CategoriaConcepto;
use App\Concepto;
use Validator;
use Session;
use Str;

class CategoriaEmpleadoController extends Controller
{
    public function index()
    {
        $categorias = CategoriaEmpleado::orderBy('nombre', 'DESC')->paginate(10);

        return view('admin.categoriasEmpleado.index', compact('categorias'));

    }

    public function create()
    {

        return view('admin.categoriasEmpleado.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|max:20',
        ];

        $message = [
            
            'nombre.requiered' => 'Ingrese Nombre de la Categoria',

            'nombre.max' =>'El nombre del estudiante no puede ser mayor a :max caracteres.'
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()):
            
            return back()->withErrors($validator)->with('message','Se ha Producido un Error')->with('typealert','danger');

        else:

            $categoria = new CategoriaEmpleado();

            $categoria->nombre = $request->nombre;
            
            $categoria->save();
            
            return redirect()->route('categoriasEmpleados.index');
                 
        endif;
    }

    public function edit($id)
    {
        $categorias = CategoriaEmpleado::find($id);
                
        return view('admin.categoriasEmpleado.edit', compact('categorias'));
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'nombre' => 'required|max:20',
        ];

        $message = [
            
            'nombre.requiered' => 'Ingrese Nombre de la Categoria',

            'nombre.max' =>'El Nombre no puede ser mayor a :max caracteres.'
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()):
            
            return back()->withErrors($validator)->with('message','Se ha Producido un Error')->with('typealert','danger');

        else:

            $categoria = CategoriaEmpleado::find($id);

            $categoria->nombre = $request->nombre;

            $categoria->estado = $request->estado;
      
            $categoria->save();
                        
            return redirect()->route('categoriasEmpleados.index');
                 
        endif;
    }

    public function agregar($id)
    {
        $categoria = CategoriaEmpleado::find($id);

        $conceptos = Concepto::get();

        $categoriasConceptos = CategoriaConcepto::where('categoria_id','like',$id)->get();

        return view('admin.categoriasEmpleado.agregar',compact('categoria','conceptos','categoriasConceptos'));
    }

    public function storeConcepto(Request $request,$id){
        
        $categoria = new CategoriaConcepto();

        $categoria->categoria_id = $id;

        $categoria->concepto_id = $request->concepto;

        $categoria->montoFijo = $request->montoFijo;

        $categoria->montoVariable = $request->montoVariable;
        
        $categoria->save();
        
        return back()->with('message','Categoria Registrada con exito')->with('typealert','success');

    }

    public function editConcepto($id)
    {
        $concepto_id = $id;

        $conceptos = CategoriaConcepto::find( $concepto_id);

        $categoria = CategoriaEmpleado::find( $conceptos->categoria_id);
                
        return view('admin.categoriasEmpleado.editConcepto', compact('conceptos','categoria'));
    }

    public function updateConcepto(Request $request,$id)
    {
        $categoria = CategoriaConcepto::find($id);

        $categoria->categoria_id =  $request->categoria_id;

        $categoria->concepto_id = $request->concepto_id;

        $categoria->montoFijo = $request->montoFijo;

        $categoria->montoVariable = $request->montoVariable;
        
        $categoria->save();
                
        return redirect()->route('categoriasEmpleados.index');
    }

}
