<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaConcepto;
use Validator;
use Session;
use Str;

class CategoriaConceptoController extends Controller
{

    public function store(Request $request,$id)
    {

            $categoria = new CategoriaConcepto();

            $categoria->categoria_id = $id;

            $categoria->concepto_id = $request->concepto;

            $categoria->montoFijo = $request->montoFijo;

            $categoria->montoVariable = $request->montoVariable;
            
            $categoria->save();
            
            return back()->with('message','Categoria Registrada con exito')->with('typealert','success');

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
