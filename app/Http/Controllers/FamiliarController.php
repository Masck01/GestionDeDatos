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
        $familiar->usuario_id = $request->id;
        $familiar->nombre = $request->nombre;
        $familiar->fechaNacimiento = $request->fechaNacimiento;
        $familiar->parentesco = $request->parentesco;
        $familiar->dni = $request->dni;
        $familiar->save();

        return redirect()->route('usuarios.show',$familiar->usuario_id);

    }

    public function update(Request $request)
    {
        $id = $request->idContacto;
        $contacto = Familiar::find($id);
        $contacto->proveedor_id = $request->id;
        $contacto->nombre = $request->nombre;
        $contacto->telefonos = $request->telefonos;
        $contacto->email = $request->email;
        $contacto->sector = $request->sector;
        $contacto->save();

        return redirect()->route('usuarios.show',$request->id)->with('success','Proveedores actualizado correctamente');
    }


}

