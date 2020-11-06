<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use Validator;
use Session;
use Str;

class MarcasController extends Controller
{
    public function index()
    {
        $marcas = Marca::orderBy('nombre', 'DESC')->paginate(5);

        return view('admin.marcas.index', compact('marcas'));

    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|max:255',
        ];

        $message = [
            
            'nombre.requiered' => 'Ingrese Marca del Producto',

            'nombre.max' =>'El nombre de la Marca no puede ser mayor a :max caracteres.'
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()):
            
            return back()->withErrors($validator)->with('message','Se ha Producido un Error')->with('typealert','danger');

        else:

            $marcas = new Marca();

            $marcas->nombre = $request->nombre;

            $marcas->estado = 'Activo';
            
            $marcas->save();
            
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

            $marcas = Marca::find($id);

            $marcas->nombre = $request->nombre;
      
            $marcas->save();
                        
            return back()->with('message','Marca Actualizada con exito')->with('typealert','success');
                 
        endif;
    }

    public function eliminar($id)
    {
            $marcas = Marca::find($id);

            $marcas->estado = 'Inactivo';
            
            $marcas->save();
                        
            return back();
    }

    public function activar($id)
    {
            $marcas = Marca::find($id);

            $marcas->estado = 'Activo';
            
            $marcas->save();
                        
            return back();
    }
}
