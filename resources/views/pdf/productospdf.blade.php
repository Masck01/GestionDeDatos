<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Productos</title>
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

    <div id="div1">

     Farmacia Avellaneda Norte

    </div>

    <div id="div2">

      <?php
        echo "Fecha: " . date("d") . "/" . date("m") . "/" . date("Y");
      ?>

    </div>

  <div id="div3">
  <br>
  <h4> Listado de Productos Registrados </h4>
  <br>
    <table class="table table-bordered table-sm">
    <thead>
      <tr style="background-color: black; color:white">
        <td>#</td>
        <td>Nombre</td>
        <td>Marca</td>
        <td>Categoria</td>
        <td>Precio Compra</td>
        <td>Precio Venta</td>
        <td>Stock</td>
        <td>Fecha Vencimiento</td>
        <td>Almacen</td>
        <td>Proveedor</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ Arr::get($producto,'marcas.nombre')}}</td>
            <td>{{ Arr::get($producto,'categoria.nombre')}}</td>
            <td>{{ $producto->precio_compra }}</td>
            <td>{{ $producto->precio_venta }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->fecha_vencimiento }}</td>
            <td>{{ Arr::get($producto,'almacen.nombre')}}</td>
            <td>{{ Arr::get($producto,'proveedor.razon_social')}}</td>

        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </body>
</html>
