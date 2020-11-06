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
        $clientes = Cliente::orderBy('nombre_fantasia', 'ASC')->paginate(10);
        
        $total = Cliente::count();
        
        return view('admin.clientes.index', compact('clientes','total'));
    }

    public function create()
    {
        $provincias = Provincia::orderBy('nombre', 'ASC')
                      ->select('nombre as nombre', 'id as id')
                      ->get();

        return view('admin.clientes.create',compact('provincias'));
    }

    public function store(Request $request)
    {
        $cliente = new Cliente;
        $cliente->nombre_Fantasia = $request->nombre;
        $cliente->razon_Social = $request->nombre;
        $cliente->cuit_cuil = $request->cuit_cuil;
        $cliente->telefonos = $request->telefonos;
        $cliente->email = $request->email;
        $cliente->direccion = $request->direccion;
        $cliente->ciudad = $request->ciudad;
        $cliente->codigo_postal = $request->codigo_postal;
        $cliente->genero = $request->genero;
        $cliente->provincia_id = $request->provincia_id;
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
                  
        $provincias = Provincia::orderBy('nombre', 'ASC')
        ->select('nombre as nombre', 'id as id')
        ->get();

        return view('admin.clientes.edit', compact('cliente','provincias'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->nombre_Fantasia = $request->nombre;
        $cliente->razon_Social = $request->nombre;
        $cliente->cuit_cuil = $request->cuit_cuil;
        $cliente->telefonos = $request->telefonos;
        $cliente->email = $request->email;
        $cliente->direccion = $request->direccion;
        $cliente->ciudad = $request->ciudad;
        $cliente->codigo_postal = $request->codigo_postal;
        $cliente->genero = $request->genero;
        $cliente->tipo = $request->tipo;
        $cliente->provincia_id = $request->provincia_id;
        $cliente->save();

        return redirect()->route('clientes.index')->with('success','Cliente actualizado correctamente');
    }

}
