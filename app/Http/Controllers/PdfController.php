<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Cliente;
use App\Presupuesto;
use App\Deposito;
use App\Compra;
use Barryvdh\DomPDF\Facade as PDF;
use Luecano\NumeroALetras\NumeroALetras;

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

    public function recivo ($id)
    {
        $pedido = Compra::find($id);;

        $detalle = $pedido->detalle_compra()->get();
        $numaletras = new NumeroALetras();
        if($pedido->tipoproveedor == 'Consumidor Final'):
        $pdf = PDF::loadView('pdf.remitoXentregaCF',['pedido'=>$pedido,'detalle'=>$detalle,'numaletras'=>$numaletras])->setPaper('a4', 'landscape');

        return $pdf->stream();
        else:
        $pdf = PDF::loadView('pdf.remitoXentrega',['pedido'=>$pedido,'detalle'=>$detalle,'numaletras'=>$numaletras])->setPaper('a4', 'landscape');
        return $pdf->stream();
        endif;
    }
}
