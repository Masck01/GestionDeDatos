@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-10">
                <h4>Detalle Compra</h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <br>
                {{-- <p><b>Proveedor: </b> {{ $compra->proveedor->razon_social}} </p> --}}
                {{-- <p><b>Empleado: </b> {{ $compra->user->apellido}} {{ $compra->user->nombre}} </p> --}}
                <p><b>Fecha de Alta</b>{{ $compra->getFromDateAttribute($compra->fechaalta) }}</p>
                <p><b>Codigo Compra</b>{{'PP0'.$compra->proveedor_id."-".'0000000'.$compra->id }}</p>
                <p><b>Subtotal Compra: </b>$ {{ $compra->subtotalcompra }}</p>
                <p><b>IVA Compra: </b>$ {{ $compra->ivacompra }}</p>
                <p><b>Total Compra en Pesos: </b>$ {{ $compra->total }}</p>
                <p><b>Fecha de Compra</b>{{ $compra->getFromDateAttribute($compra->fechacompra) }}</p>
                <p><b>Tipo de Proveedor: </b>$ {{ $compra->tipoproveedor }}</p>
              </div>
            </div>

            <div class="col-md-12">
                <table class="table">
              <thead>
                <tr>
                  <th>&nbsp;Nro</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($detalle as $det)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$det->producto->nombre }}</td>
                    <td>{{$det->cantidad }}</td>
                    <td>${{$det->subtotal }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <div class="form-group">

            <a class="btn btn-danger" href="{{ route('compras.index')}}" role="button">Volver </a>

        </div>


            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
