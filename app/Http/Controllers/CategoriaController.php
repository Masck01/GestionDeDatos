<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Validator;
use Session;
use Str;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('descripcion', 'DESC')->paginate(5);

        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {

        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'descripcion' => 'required|max:20',
        ];

        $message = [

            'descripcion.requiered' => 'Ingrese Nombre de la Categoria',

            'descripcion.max' => 'El nombre del estudiante no puede ser mayor a :max caracteres.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) :

            return back()->withErrors($validator)->with('message', 'Se ha Producido un Error')->with('typealert', 'danger');

        else :

            $categoria = new Categoria();

            $categoria->descripcion = $request->descripcion;

            $categoria->salario_basico = $request->salario_basico;


            $categoria->save();

            return back()->with('message', 'Categoria Registrada con exito')->with('typealert', 'success');

        endif;
    }

    public function update(Request $request)
    {
        $rules = [
            'descripcion' => 'required|max:20',
        ];

        $message = [

            'descripcion.requiered' => 'Ingrese Nombre de la Categoria',

            'descripcion.max' => 'El Nombre no puede ser mayor a :max caracteres.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) :

            return back()->withErrors($validator)->with('message', 'Se ha Producido un Error')->with('typealert', 'danger');

        else :

            $id = $request->id;

            $categoria = Categoria::find($id);

            $categoria->descripcion = $request->descripcion;

            $categoria->salario_basico = $request->salario_basico;

            $categoria->save();

            return back()->with('message', 'Categoria Actualizada con exito')->with('typealert', 'success');

        endif;
    }

    public function eliminar($id)
    {
        $categoria = Categoria::find($id);

        $categoria->estado = 'Inactivo';

        $categoria->save();

        return back();
    }

    public function activar($id)
    {
        $categoria = Categoria::find($id);

        $categoria->estado = 'Activo';

        $categoria->save();

        return back();
    }
}
