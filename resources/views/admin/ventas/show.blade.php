@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-10">
                <h4>Detalle de la Venta</h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <br>
                <p><b>Empleado: </b> {{ $pedido->empleado_id}} </p>
                <p><b>Fecha: </b>{{ $pedido->getFromDateAttribute($pedido->fecha) }}</p>
                <p><b>Total: </b> AR$ {{ $pedido->total }} </p>
                <p><b>Estado: </b> {{ $pedido->estado }} </p>
              </div>
            </div>

            <div class="col-md-12">
                <h4>Productos</h4>
                <table class="table">
              <thead>
                <tr>
                  <th>&nbsp;</th>
                  <th>Nombre</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Sub Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($detalle as $det)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$det->producto->nombre }}</td>
                    <td>{{$det->cantidad }}</td>
                    <td> AR$ {{$det->precio  }} </td>
                    <td> AR$ {{$det->precio  * $det->cantidad }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <div class="form-group">

                <a class="btn btn-danger" href="{{ route('ventas.index')}}" role="button">Volver </a>

            </div>

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
