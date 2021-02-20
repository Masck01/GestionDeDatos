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
use App\Familiar;
use Validator;
use App\MovimientoCaja;
use DB;
use Session;
use Carbon\Carbon;
use Response;
use App\HistorialMovimientos;
use Illuminate\Support\Collection;
use Luecano\NumeroALetras\NumeroALetras;
use Illuminate\Support\Facades\Auth;


class FamiliarController extends Controller
{

    public function store(Request $request)
    {
        $familiar = new Familiar;
        $familiar->empleado_id = $request->id;
        $familiar->dni = $request->dni;
        $familiar->apellido = $request->apellido;
        $familiar->nombre = $request->nombre;
        $familiar->fecha_Nacimiento = $request->fecha_Nacimiento;
        $familiar->parentesco = $request->parentesco;
        $familiar->save();

        return redirect()->route('empleados.show',$familiar->empleado_id);
    }

    public function update(Request $request)
    {
        $rules = [
            'nombre' => 'required|max:255',
        ];

        $message = [

            'nombre.required' => 'Ingrese Marca del Producto',

            'nombre.max' =>'El nombre de la Marca no puede ser mayor a :max caracteres.'
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha Producido un Error')->with('typealert','danger');

        else:

        $id = $request->id;
        $familiar = Familiar::find($id);
        $familiar->empleado_id = $request->id;
        $familiar->dni = $request->dni;
        $familiar->apellido = $request->apellido;
        $familiar->nombre = $request->nombre;
        $familiar->fecha_Nacimiento = $request->fecha_Nacimiento;
        $familiar->parentesco = $request->parentesco;
        $familiar->save();


        return redirect()->route('empleados.show',$request->id)->with('success','Grupo Familiar actualizado correctamente');
        endif;
    }


}

