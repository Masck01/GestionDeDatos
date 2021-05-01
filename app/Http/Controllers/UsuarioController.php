<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Usuario;
use App\Familiar;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Empleado;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::orderBy('username', 'ASC')->paginate(10);



        return view('admin.usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    $empleados = Empleado::orderBy('id', 'DESC')->paginate(10);


        return view('admin.usuarios.create',compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new Usuario();
        $user->username = $request->username;
        $user->password =bcrypt($request->password);
        $user->email = $request->email;
        $user->tipousuario =  $request->tipousuario;
        $user->empleado_id= $request->empleado;
        $user->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);


        return view('admin.usuarios.show',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);


        $empleados = Empleado::orderBy('id', 'DESC')->paginate(10);

        return view('admin.usuarios.edit',compact('usuario','empleados'));

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
        $user = Usuario::findOrFail($id);
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->categoria_id =  $request->categoria;
        $user->empleado_id = $request->empleado;
        $user->save();

        return redirect()->route('usuarios.index')->with('success','Usuario Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success','Usuario eliminado correctamente');
    }
}
