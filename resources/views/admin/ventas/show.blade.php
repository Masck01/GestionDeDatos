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
                <p><b>Codigo Venta: </b>{{'000'.$pedido->empleado_id."-".'0000000'.$pedido->id}}</td>
                <p><b>Fecha: </b>{{ $pedido->getFromDateAttribute($pedido->fecha) }}</p>
                <p><b>Total Bruto: </b> AR$ {{ $pedido->subtotalventa }} </p>
                <p><b>IVA: </b> AR$ {{ $pedido->iva }} </p>
                <p><b>Total Neto: </b> AR$ {{ $pedido->total }} </p>
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
                    <td> AR$ {{$det->producto->precio_venta}} </td>
                    <td> AR$ {{$det->producto->precio_venta *$det->cantidad }}</td>
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
