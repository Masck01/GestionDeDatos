<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Unidad_Negocio;
use App\Provincia;
use App\Categoria;
use App\User;
use App\Rubro;
use App\Pedido;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClienteExport;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::orderBy('razon_social', 'ASC')->paginate(10);

        $total = Cliente::count();

        return view('admin.clientes.index', compact('clientes','total'));
    }

    public function create()
    {


        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente;
        $cliente->razon_social = $request->razon_social;
        $cliente->cuit= $request->cuit;
        $cliente->direccion= $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->tipo = $request-> tipo;
        $cliente->estado = 'Activo';

        $cliente->save();

        return redirect()->route('clientes.index');
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('admin.clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);



        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->razon_social = $request->razon_social;
        $cliente->Cuit = $request->Cuit;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->tipo =$request->tipo ;
        $cliente->estado = 'Activo';

        $cliente->save();

        return redirect()->route('clientes.index')->with('success','Cliente actualizado correctamente');
    }

}
