<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategoria;
use App\Categoria;
use Validator;
use Session;
use Str;

class SubCategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = SubCategoria::orderBy('nombre', 'DESC')->paginate(5);

        $categorias = Categoria::where('estado','LIKE','Activo')->orderBy('descripcion', 'ASC')->get();

        return view('admin.subcategorias.index', compact('subcategorias','categorias'));

    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|max:20',
        ];

        $message = [

            'nombre.requiered' => 'Ingrese Nombre de la Categoria',

            'nombre.max' =>'El nombre del estudiante no puede ser mayor a :max caracteres.'
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha Producido un Error')->with('typealert','danger');

        else:

            $subcategoria = new SubCategoria();

            $subcategoria->nombre = $request->nombre;

            $subcategoria->categoria_id = $request->categoria;

            $subcategoria->estado = 'Activo';


            $subcategoria->save();

            return back()->with('message','Sub Categoria Registrada con exito')->with('typealert','success');

        endif;
    }

    public function update(Request $request)
    {
        $rules = [
            'nombre' => 'required|max:20',
        ];

        $message = [

            'nombre.requiered' => 'Ingrese Nombre de la Categoria',

            'nombre.max' =>'El Nombre no puede ser mayor a :max caracteres.'
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha Producido un Error')->with('typealert','danger');

        else:

            $id = $request->id;

            $subcategoria = SubCategoria::find($id);

            $subcategoria->categoria_id = $request->categoria;

            $subcategoria->nombre = $request->nombre;

            $subcategoria->save();

            return back()->with('message','Categoria Actualizada con exito')->with('typealert','success');

        endif;
    }

    public function eliminar($id)
    {
            $categoria = SubCategoria::find($id);

            $categoria->estado = 'Inactivo';

            $categoria->save();

            return back();
    }

    public function activar($id)
    {
            $categoria = SubCategoria::find($id);

            $categoria->estado = 'Activo';

            $categoria->save();

            return back();
    }

}
