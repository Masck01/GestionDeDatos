<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Provincia;
use App\Rubro;
use App\Unidad_Negocio;
use Barryvdh\DomPDF\Facade as PDF;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::orderBy('razon_Social', 'ASC')->paginate(10);

        return view('admin.proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        $provincias = Provincia::orderBy('nombre', 'ASC')
                      ->select('nombre as nombre', 'id as id')
                      ->get();

        return view('admin.proveedores.create',compact('provincias'));
    }


    public function store(Request $request)
    {
        $provedor = new Proveedor;
        $provedor->razon_Social = $request->razonSocial;
        $provedor->cuit_cuil = $request->cuit_cuil;
        $provedor->telefonos = $request->telefonos;
        $provedor->email = $request->email;
        $provedor->direccion = $request->direccion;
        $provedor->ciudad = $request->ciudad;
        $provedor->codigo_postal = $request->codigo_postal;
        $provedor->provincia_id = $request->provincia_id;
        $provedor->save();

        return redirect()->route('proveedores.index');
    }

    public function show($id)
    {
        $proveedor = Proveedor::find($id);

        return view('admin.proveedores.show', compact('proveedor'));
    }

    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        
        $provincias = Provincia::orderBy('nombre', 'ASC')->select('nombre as nombre', 'id as id')->get();
        
        return view('admin.proveedores.edit', compact('proveedor','provincias'));
    }

    public function update(Request $request, $id)
    {
        $provedor = Proveedor::find($id);
        $provedor->razon_Social = $request->razonSocial;     
        $provedor->cuit_cuil = $request->cuit_cuil;
        $provedor->telefonos = $request->telefonos;
        $provedor->direccion = $request->direccion;
        $provedor->ciudad = $request->ciudad;
        $provedor->codigo_postal = $request->codigo_postal;
        $provedor->provincia_id = $request->provincia_id;
        $provedor->save();
        return redirect()->route('proveedores.index');
    }

    public function listadoProveedores ()
    {
        $proveedores = Proveedor::orderBy('razon_Social', 'ASC')->get();

        $pdf = PDF::loadView('pdf.proveedorespdf',['proveedores'=>$proveedores])->setPaper('a4', 'landscape');
    
        return $pdf->stream();
    }

}
