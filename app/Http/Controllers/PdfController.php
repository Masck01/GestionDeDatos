<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Cliente;
use App\Presupuesto;
use App\Deposito;
use App\Compra;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    public function listadoEmpresas()
    {
        $empresas = Empresa::where('tipo','like','Empresa')->get();

        $pdf = PDF::loadView('pdf.empresaspdf',['empresas'=>$empresas]);

        return $pdf->stream();
    }

    public function listadoClientes()
    {
        $clientes = Cliente::where('tipo','like','persona')->get();

        $pdf = PDF::loadView('pdf.clientespdf',['clientes'=>$clientes])->setPaper('a4', 'landscape');
    
        return $pdf->stream();
    }

    public function listadoDepositos()
    {
        $depositos = Deposito::get();

        $pdf = PDF::loadView('pdf.depositospdf',compact('depositos'))->setPaper('a4', 'landscape');
    
        return $pdf->stream();
    }

    public function imprimirRemito($id)
    {
        $pedido = Compra::find($id);;

        $detalle = $pedido->detalle_compra()->get();

        $pdf = PDF::loadView('pdf.remitoXentrega',['pedido'=>$pedido],['detalle'=>$detalle])->setPaper('a4','landscape');
    
        return $pdf->stream();
    }
}