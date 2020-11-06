<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Capacidad;
use Validator;
use Session;
use Str;

class CapacidadController extends Controller
{
    public function index()
    {
        $capacidad = Capacidad::orderBy('nombre', 'DESC')->paginate(5);

        return view('admin.capacidad.index', compact('capacidad'));

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

            $capacidad = new Capacidad();

            $capacidad->nombre = $request->nombre;
            
            $capacidad->save();
            
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

            $capacidad = Capacidad::find($id);

            $capacidad->nombre = $request->nombre;
      
            $capacidad->save();
                        
            return back()->with('message','Categoria Actualizada con exito')->with('typealert','success');
                 
        endif;
    }

    public function eliminar($id)
    {
            $capacidad = Capacidad::find($id);

            $capacidad->estado = 'Inactivo';
            
            $capacidad->save();
                        
            return back();
    }

    public function activar($id)
    {
            $capacidad = Capacidad::find($id);

            $capacidad->estado = 'Activo';
            
            $capacidad->save();
                        
            return back();
    }

}
