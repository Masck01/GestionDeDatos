@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="col-md-12">
              <h4>Listado de Conceptos</h4>
            </div>
          </div>
          <div class="panel-body">
            <div id="message">
             {{--  @include('flash-message') --}}
            </div>
            <table class="table">
              <thead>
                <tr>
                <th style="text-align:center;"><a href="{{ route('conceptos.create') }}" class="btn btn-link" data-toggle="tooltip" title="Nueva Venta" data-original-title="Generar Presupuesto"><i class="fas fa-plus"></i></a></th>
                  <th>Descripcion</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th>Opcion</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($concepto as $con)
                  <tr>
                    <td style="text-align:center">{{$loop->iteration}}</td>
                    <td>{{ $con->descripcion }}</td>
                    <td>{{ $con->tipo }}</td>
                    <td>{{ $con->estado }}</td>
                    <td>
                    <a href="{{ route('conceptos.edit', $con->id) }}" class="btn btn-link" data-toggle="tooltip" title="Editar Deposito" data-original-title="Editar Producto"><i class="fas fa-pencil-alt" style="color:black; font-size: 20px;"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{$concepto->render()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script type="text/javascript">
    setTimeout(function() {
      $('#message').fadeOut('fast');
    }, 2000);
  </script>
@endsection

