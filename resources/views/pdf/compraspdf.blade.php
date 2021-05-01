<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Compras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>

  <style>
    #div1{
      float:left;
      width:850px;
    }

    #div2{
      float:left;
    }

    #div3{
      clear:both;
    }

    table{
	    width:100%;
	    border-collapse:collapse;
    }

    td{
	    border:2px solid black;
    }
  </style>

  <body>

    <div id="div1"><h4 class="name">FARMACIA AVELLANEDA NORTE</h4>
        <div>Av. Sarmiento 199 | 4000 | Tucumán</div>
        <div>Tel / Fax. 0381. 4219399 </div>
        <div><a href="mailto:dhsay@arnet.com.ar">favellanedanorte@arnet.com.ar</a></div>

    </div>

    <div id="div2">

      <?php
        echo "Fecha: " . date("d") . "/" . date("m") . "/" . date("Y");
      ?>

    </div>

  <div id="div3">
  <br>
  <h2> Listado De Compras Registradas </h2>
  <br>
    <table class="table table-success table-sm">
    <thead>
      <tr style="background-color: black; color:white">
        <td>#</td>
        <td>Fecha Alta</td>
        <td>Nro Factura</td>
        <td>Proveedor</td>
        <td>Tipo Proveedor</td>
        <td>Cuit Proveedor</td>
        <td>Total Bruto</td>
        <td>IVA Compra</td>
        <td>Total Neto</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($pedidos as $pedido)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $pedido->getFromDateAttribute($pedido->fechaalta) }}</td>
            <td> {{$pedido->nrofactura}}</td>
            <td>{{ Arr::get($pedido,'proveedor.razon_social') }} </td>
            <td>{{ $pedido->tipoproveedor }} </td>
            <td>{{ Arr::get($pedido,'proveedor.cuit')}} </td>
            <td> AR$ {{ $pedido->subtotalcompra }} </td>
            <td> AR$ {{ $pedido->ivacompra }} </td>
            <td> AR$ {{ $pedido->total }} </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>


            <td style="background-color: black; color:white"> Total </td>
            <td style="background-color: black; color:white">  AR$  {{ $subtotalcompras }}</td>
            <td style="background-color: black; color:white">  AR$  {{ $ivatotal }}</td>
            <td style="background-color: black; color:white">  AR$  {{ $orders }}</td>
        </tr>
    </tfoot>
    </table>
    </div>
  </body>
</html>
