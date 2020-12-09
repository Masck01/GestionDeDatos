@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="col-md-12">
              <h4>Listado de Categorias</h4>
            </div>
          </div>
          <div class="panel-body">
            <div id="message">
             {{--  @include('flash-message') --}}
            </div>
            <table class="table">
              <thead>
                <tr>
                <th style="text-align:center;"><a href="{{ route('categoriasEmpleados.create') }}" class="btn btn-link" data-toggle="tooltip" title="Nueva Venta" data-original-title="Generar Presupuesto"><i class="fas fa-plus"></i></a></th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th>Opcion</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categorias as $categoria)
                  <tr>
                    <td style="text-align:center">{{$loop->iteration}}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->estado }}</td>
                    <td>
                    <a href="{{ route('categoriasEmpleados.edit', $categoria->id) }}" class="btn btn-link" data-toggle="tooltip" title="Editar Categoria" data-original-title="Editar Producto"><i class="fas fa-pencil-alt" style="color:black; font-size: 20px;"></i></a>
                    <a href="{{ route('categoriasEmpleados.agregar', $categoria->id) }}" class="btn btn-link" data-toggle="tooltip" title="Agregar Concepto" data-original-title="Agregar Concepto"><i class="fas fa-address-book" style="color:black; font-size: 20px;"></i></a>
                    <a href="{{ route('liquidacion.lista',$categoria->id) }}" class="btn btn-link" data-toggle="tooltip" title="Liquidar Sueldo" data-original-title="Agregar Concepto"><i class="fas fa-money-bill-wave" style="color:black; font-size: 20px;"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{$categorias->render()}}
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

