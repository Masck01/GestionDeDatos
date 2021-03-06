<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Validator;
use Session;
use Str;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('nombre', 'DESC')->paginate(5);

        return view('admin.categorias.index', compact('categorias'));

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

            $categoria = new Categoria();

            $categoria->nombre = $request->nombre;
            
            $categoria->save();
            
            return back()->with('message','Categoria Registrada con exito')->with('typealert','success');
                 
        endif;
    }

    public function update(Request $request)
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

            $id = $request->id;

            $categoria = Categoria::find($id);

            $categoria->nombre = $request->nombre;
      
            $categoria->save();
                        
            return back()->with('message','Categoria Actualizada con exito')->with('typealert','success');
                 
        endif;
    }

    public function eliminar($id)
    {
            $categoria = Categoria::find($id);

            $categoria->estado = 'Inactivo';
            
            $categoria->save();
                        
            return back();
    }

    public function activar($id)
    {
            $categoria = Categoria::find($id);

            $categoria->estado = 'Activo';
            
            $categoria->save();
                        
            return back();
    }

}
