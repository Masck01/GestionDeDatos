<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Caja;
use App\MovimientodeCaja;
use Carbon\Carbon;
use Validator;

class CajasController extends Controller
{
    public function index()
    {
        $cajas = caja::find(1);

        $movimientos = MovimientodeCaja::where('caja_id','like','1')->orderBy('id','DESC')->paginate('10');

        return view('admin.cajas.index', compact('cajas','movimientos'));

    }

    public function store(Request $request)
    {
        $mytime = Carbon::now('America/Argentina/Tucuman');

        $rules = [

            'descripcion' => 'required',

            'monto' => 'required'
        ];

        $message = [
            
            'descripcion.requiered' => 'Ingrese La descripcion Del Movimiento',

            'monto.requiered' => 'Ingrese el Monto Del Movimiento',

        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()):
            
            return back()->withErrors($validator)->with('message','Se ha Producido un Error')->with('typealert','danger');

        else:

            $cajas = caja::find(1);

            if($request->moneda == 'Pesos'):

                $cajas->saldoPesos = $cajas->saldoPesos + $request->monto;

                $cajas->save();

            else:

                $cajas->saldoDolares = $cajas->saldoDolares + $request->monto;

                $cajas->save();
            
            endif;

            $movimiento = new MovimientodeCaja();

            $movimiento->cajas_id = 1;

            $movimiento->descripcion = $request->descripcion;

            $movimiento->fecha = $mytime->toDateTimeString();

            $movimiento->entrada = $request->monto;

            $movimiento->salida = '0';

            $movimiento->moneda =  $request->moneda;

            $movimiento->saldoparcialpesos =  $cajas->saldoPesos;

            $movimiento->saldoparcialdolares =  $cajas->saldoDolares;

            $movimiento->save();

            
            return back()->with('message','Caja Registrada con exito')->with('typealert','success');
                 
        endif;
    }

    public function resta(Request $request)
    {
        $mytime = Carbon::now('America/Argentina/Tucuman');

        $rules = [

            'descripcion' => 'required',

            'monto' => 'required'
        ];

        $message = [
            
            'descripcion.requiered' => 'Ingrese La descripcion Del Movimiento',

            'monto.requiered' => 'Ingrese el Monto Del Movimiento',

        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()):
            
            return back()->withErrors($validator)->with('message','Se ha Producido un Error')->with('typealert','danger');

        else:

            $cajas = caja::find(1);

            if($request->moneda == 'Pesos'):

                $cajas->saldoPesos = $cajas->saldoPesos - $request->monto;

                $cajas->save();

            else:

                $cajas->saldoDolares = $cajas->saldoDolares - $request->monto;

                $cajas->save();
            
            endif;

            $movimiento = new MovimientodeCaja();

            $movimiento->cajas_id = 1;

            $movimiento->descripcion = $request->descripcion;

            $movimiento->fecha = $mytime->toDateTimeString();

            $movimiento->entrada = '0';

            $movimiento->salida = $request->monto;

            $movimiento->moneda =  $request->moneda;

            $movimiento->saldoparcialpesos =  $cajas->saldoPesos;

            $movimiento->saldoparcialdolares =  $cajas->saldoDolares;

            $movimiento->save();

            
            return back()->with('message','Caja Registrada con exito')->with('typealert','success');
                 
        endif;
    }

    public function sumar(Request $request)
    {
        $mytime = Carbon::now('America/Argentina/Tucuman');

        $rules = [

            'descripcion' => 'required',

            'monto' => 'required'
        ];

        $message = [
            
            'descripcion.requiered' => 'Ingrese La descripcion Del Movimiento',

            'monto.requiered' => 'Ingrese el Monto Del Movimiento',

        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()):
            
            return back()->withErrors($validator)->with('message','Se ha Producido un Error')->with('typealert','danger');

        else:

            $cajas = caja::find(1);

            if($request->moneda == 'Pesos'):

                $cajas->saldoPesos = $cajas->saldoPesos + $request->monto;

                $cajas->save();

            else:

                $cajas->saldoDolares = $cajas->saldoDolares + $request->monto;

                $cajas->save();
            
            endif;

            $movimiento = new MovimientodeCaja();

            $movimiento->cajas_id = 1;

            $movimiento->descripcion = $request->descripcion;

            $movimiento->fecha = $mytime->toDateTimeString();

            $movimiento->entrada = $request->monto;

            $movimiento->salida = '0';

            $movimiento->moneda =  $request->moneda;

            $movimiento->saldoparcialpesos =  $cajas->saldoPesos;

            $movimiento->saldoparcialdolares =  $cajas->saldoDolares;

            $movimiento->save();

            
            return back()->with('message','Caja Registrada con exito')->with('typealert','success');
                 
        endif;
    }

    public function abrirCerrar()
    {
        $mytime = Carbon::now('America/Argentina/Tucuman');

        $cajas = caja::find(1);

        if($cajas->estado == 'abierta'):

            $cajas->estado = "cerrada";

            $cajas->save();

            $movimiento = new MovimientodeCaja();

            $movimiento->cajas_id = 1;

            $movimiento->descripcion = 'Cierre de Caja';

            $movimiento->fecha = $mytime->toDateTimeString();

            $movimiento->entrada = '0';

            $movimiento->salida = '0';

            $movimiento->moneda = 'Pesos';

            $movimiento->saldoparcialpesos =  $cajas->saldoPesos;

            $movimiento->saldoparcialdolares =  $cajas->saldoDolares;

            $movimiento->save();


        else:
            
            $cajas->estado = "abierta";

            $cajas->save();

            $movimiento = new MovimientodeCaja();

            $movimiento->cajas_id = 1;

            $movimiento->descripcion = 'Apertura de Caja';

            $movimiento->fecha = $mytime->toDateTimeString();

            $movimiento->entrada = '0';

            $movimiento->salida = '0';

            $movimiento->moneda = 'Pesos';

            $movimiento->saldoparcialpesos =  $cajas->saldoPesos;

            $movimiento->saldoparcialdolares =  $cajas->saldoDolares;

            $movimiento->save();

        endif;

        return back();

    }
}
