<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concepto;

class ConceptoController extends Controller
{

    public function index()
    {
        $concepto = Concepto::paginate(10);

        return view('admin.concepto.index', compact('concepto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.concepto.create');
    }

    public function store(Request $request)
    {
        $concepto = new Concepto();

        $concepto->descripcion =  $request->descripcion;

        $concepto->tipo =  $request->tipo;
        
        $concepto->save();
        
        return redirect()->route('conceptos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $concepto = Concepto::find($id);

        return view('admin.concepto.edit',compact('concepto'));
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
        $concepto = Concepto::find($id);

        $concepto->descripcion =  $request->descripcion;

        $concepto->tipo =  $request->tipo;

        $concepto->estado =  $request->estado;
        
        $concepto->save();
        
        return redirect()->route('conceptos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
