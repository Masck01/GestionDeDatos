<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConfiguracionCategoria;
use App\Categoria;
use App\Concepto;
use Validator;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use Str;

class ConfiguracionCategoriaController extends Controller
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
{
    public function index()
    {
        $configuracioncategorias = ConfiguracionCategoria::orderBy('id', 'DESC')->paginate(5);

        return view('admin.configuracioncategoria.index', compact('configuracioncategorias'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('id', 'DESC')->paginate(10);
        $conceptos = Concepto::orderBy('id', 'DESC')->paginate(10);

        return view('admin.configuracioncategoria.create',compact('categorias','conceptos'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $configuracioncategorias = new ConfiguracionCategoria();

            $configuracioncategorias->concepto_id = $request->concepto;

            $configuracioncategorias->categoria_id = $request->categoria;

            $configuracioncategorias->montofijo = $request->montofijo;

            $configuracioncategorias->montovariable = $request->montovariable;

            $configuracioncategorias->unidad = $request->unidad;

            $configuracioncategorias->save();

            return redirect()->route('configuracioncategoria.index');

    }

        public function edit($id)

    {
        $configuracioncategorias = ConfiguracionCategoria::findOrFail($id);

        $categorias = Categoria::orderBy('id', 'DESC')->paginate(10);
        $conceptos = Concepto::orderBy('id', 'DESC')->paginate(10);

        return view('admin.configuracioncategoria.edit',compact('configuracioncategorias','categorias','conceptos'));


    }

    public function update(Request $request)
    {


            $id = $request->id;

            $configuracioncategorias = ConfiguracionCategoria::find($id);

            $configuracioncategorias->concepto_id = $request->concepto;

            $configuracioncategorias->categoria_id = $request->categoria;

            $configuracioncategorias->montofijo = $request->montofijo;

            $configuracioncategorias->montovariable = $request->montovariable;

            $configuracioncategorias->unidad = $request->unidad;


            $configuracioncategorias->save();

            return redirect()->route('configuracioncategoria.index')->with('success','configuracion categorias Editado correctamente');



    }

    public function eliminar($id)
    {
            $configuracioncategorias = ConfiguracionCategoria::find($id);

            $configuracioncategorias->estado = 'Inactivo';

            $configuracioncategorias->save();

            return back();
    }

    public function activar($id)
    {
            $configuracioncategorias = ConfiguracionCategoria::find($id);

            $configuracioncategorias->estado = 'Activo';

            $configuracioncategorias->save();

            return back();
    }




}
