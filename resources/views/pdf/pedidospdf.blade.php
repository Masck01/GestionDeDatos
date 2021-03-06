<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Ventas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>

  <style>
    #div1{
      float:left;
      width:850px;
      position: relative;
    }

    #div2{
      float:left;
      text-align: left;
      position: relative;
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

        <div class="row">

    <div id="div1" class="col-md-4">  <h4 class="name">FARMACIA AVELLANEDA NORTE</h4>
        <div>Av. Sarmiento 199 | 4000 | Tucumán</div>
        <div>Tel / Fax. 0381. 4219399 </div>
        <div><a href="mailto:dhsay@arnet.com.ar">favellanedanorte@arnet.com.ar</a></div>

    </div>

    <div id="div2" class="col-md-8">

      <?php
        echo "Fecha: " . date("d") . "/" . date("m") . "/" . date("Y");
      ?>

    </div>

</div>

  <div id="div3">
  <br>
  <h3> Listado De Ventas Registradas </h3>
  <br>
    <table class="table table-success table-sm">
    <thead>
      <tr style="background-color: black; color:white">
        <td>#</td>
        <td>Fecha</td>
        <td>Hora</td>
        <td>Codigo Venta</td>
        <td> Cliente</td>
        <td>Tipo Cliente</td>
        <td>Cuit Cliente</td>
        <td>Total Bruto</td>
        <td>IVA</td>
        <td>Total Neto</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($pedidos as $pedido)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $pedido->getFromDateAttribute($pedido->fecha) }}</td>
            <td>{{ $pedido->getFromHoraAttribute($pedido->hora) }}</td>
            <td> {{ '000'.$pedido->empleado_id."-".'0000000'.$pedido->id}}</td>
            <td> {{ Arr::get($pedido,'cliente.razon_social')}} </td>
            <td> {{ $pedido->tipocliente }} </td>
            <td> {{ Arr::get($pedido,'cliente.Cuit' )}} </td>
            <td> AR$ {{ $pedido->subtotalventa }} </td>
            <td> AR$ {{ $pedido->iva }} </td>
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
            <td></td>



            <td style="background-color: black; color:white"> Total </td>
            <td style="background-color: black; color:white">  AR$  {{ $subtotalventas }}</td>
            <td style="background-color: black; color:white">  AR$  {{ $ivatotal }}</td>
            <td style="background-color: black; color:white">  AR$  {{ $orders }}</td>
        </tr>
    </tfoot>
    </table>
    </div>
  </body>
</html>
