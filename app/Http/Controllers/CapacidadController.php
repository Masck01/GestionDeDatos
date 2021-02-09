<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Capacidad;

class CapacidadController extends Controller
{
    public function index()
    {
        $capacidad = Capacidad::orderBy('id', 'ASC')->paginate(5);
        return view('admin.capacidad.index', compact('capacidad'));
    }

    public function store(Request $request)
    {
        $rules = [
            'cantidad' => 'required',
            'estado' => 'required|in:Activo,Inactivo'
        ];
        $message = [

            'cantidad.requiered' => 'Ingrese Nombre',
            'estado.required' => 'Ingrese el estado',
            'estado.in' => 'Debe ser Activo o Inactivo'
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha Producido un Error')->with('typealert', 'danger');
        else :
            $capacidad = new Capacidad();
            $capacidad->cantidad = $request->cantidad;
            $capacidad->estado = $request->estado;
            $capacidad->save();
            return back()->with('message', 'Registro exitoso')->with('typealert', 'success');
        endif;
    }

    public function update(Request $request)
    {
        $rules = [
            'cantidad' => 'required',
            'estado' => 'required|in:Activo,Inactivo'
        ];
        $message = [
            'cantidad.required' => 'Ingrese Nombre',
            'estado.required' => 'Ingrese el estado',
            'estado.in' => 'Debe ser Activo o Inactivo'
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha Producido un Error')->with('typealert', 'danger');
        else :
            $id = $request->id;
            $capacidad = Capacidad::find($id);
            $capacidad->cantidad = $request->cantidad;
            $capacidad->estado = $request->estado;
            $capacidad->save();
            return back()->with('message', 'Actualizacion con exito')->with('typealert', 'success');
        endif;
    }

    public function eliminar($id)
    {
        $capacidad = Capacidad::find($id);
        $capacidad->delete();
        return back();
    }
}
