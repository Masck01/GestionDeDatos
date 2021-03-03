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
        return view('admin.proveedores.create');
    }


    public function store(Request $request)
    {
        $provedor = new Proveedor;
        $provedor->razon_social = $request->razon_social;
        $provedor->cuit = $request->cuit;
        $provedor->telefono = $request->telefono;
        $provedor->estado = 'Activo';
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

        return view('admin.proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $provedor = Proveedor::find($id);
        $provedor->razon_social = $request->razon_social;
        $provedor->cuit = $request->cuit;
        $provedor->telefono = $request->telefono;
        $provedor->estado = $request->estado;
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
