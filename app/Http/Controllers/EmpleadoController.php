<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Empleado;
use App\Familiar;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('apellido', 'ASC')->paginate(10);

        

        return view('admin.empleados.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('descripcion', 'DESC')->paginate(10);
        
        return view('admin.empleados.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->email = $request->email;
        $empleado->telefono_celular = $request->telefono_celular;
        $empleado->telefono_fijo = $request->telefono_fijo;
        $empleado->domicilio = $request->domicilio;
        $empleado->cuit = $request->cuit;
        $empleado->pagina_principal = 'home';
        $empleado->categoria_id =  $request->categoria;
        $empleado->cuenta = $request->cuenta;
        $empleado->fechaIngreso = $request->ingreso;
        $empleado->save();
        
        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);

        $clientes = Familiar::where('empleado_id','like',$empleado->id)->orderBy('id', 'ASC')->paginate(10);

        return view('admin.empleados.show',compact('empleado','clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);

        $categorias = Categoria::orderBy('descripcion', 'DESC')->paginate(10);
        
        return view('admin.empleados.edit',compact('empleado','categorias'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->email = $request->email;
        $empleado->telefono_celular = $request->telefono_celular;
        $empleado->telefono_fijo = $request->telefono_fijo;
        $empleado->domicilio = $request->domicilio;
        $empleado->cuil_cuit = $request->cuit;
        $empleado->pagina_principal = 'home';
        $empleado->categoria_id =  $request->categoria_id;
        $empleado->cuenta = $request->cuenta;
        $empleado->fechaIngreso = $request->ingreso;
        $empleado->save();

        return redirect()->route('empleados.index')->with('success','Empleado Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success','Empleado eliminado correctamente');
    }
}
