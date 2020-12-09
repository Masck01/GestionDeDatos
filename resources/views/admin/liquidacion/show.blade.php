@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-10">
                <h4>Detalle Liquidacion</h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <br>
                <p><b>Empleado: </b> {{ $liquidacion->usuario->apellido}} {{ $liquidacion->usuario->nombre}} </p>
                <p><b>Fecha </b>{{ $liquidacion->getFromDateAttribute($liquidacion->fecha) }}</p>
                <p><b>Salario Bruto: </b>$ {{ $liquidacion->salarioBruto}}</p>
                <p><b>Retenciones: </b> $ {{ $liquidacion->salarioBruto - $liquidacion->salarioNeto }}</p>
                <p><b>Salario Neto: </b>$ {{ $liquidacion->salarioNeto }}</p>
              </div>
            </div>

            <div class="col-md-12">
                <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Concepto</th>
                  <th>Unidades</th>
                  <th>Haberes</th>
                  <th>Retenciones</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($detalle as $det)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$det->concepto->descripcion }}</td>
                    @if($det->concepto->descripcion == 'Antiguedad')
                      <td> {{$ano_diferencia}} [Años]</td>	
										@else
										<td>{{$det->cantidad}}[u]</td>	
										@endif	
                    <td> AR$ {{$det->montoFijo}} </td>
                    <td> AR$ {{$det->montoVariable * $basico->monto }} </td>  
                  </tr>
                @endforeach
              </tbody>
            </table>

            <div class="form-group">
        		
            <a class="btn btn-danger" href="{{ route('liquidacion.index')}}" role="button">Volver </a>
    
        </div>
       
           
            </div>

          </div>
                 
        </div>
      </div>
    </div>
  </div>
@endsection
