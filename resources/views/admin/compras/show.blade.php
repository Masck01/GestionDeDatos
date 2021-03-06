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
                <p><b>Proveedor: </b> {{ $compra->proveedor->razon_Social}} </p>
                <p><b>Empleado: </b> {{ $compra->user->apellido}} {{ $compra->user->nombre}} </p>
                <p><b>Fecha </b>{{ $compra->getFromDateAttribute($compra->fecha) }}</p>
                <p><b>Total Presupuestado en Pesos: </b>$ {{ $compra->total }}</p>
              </div>
            </div>

            <div class="col-md-12">
                <table class="table">
              <thead>
                <tr>
                  <th>&nbsp;</th>
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
                    <td>${{$det->costo }}</td>                 
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
