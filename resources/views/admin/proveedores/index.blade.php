@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Proveedores</h1>
                </div>

              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Comienza la tabla -->

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listado de Proveedores</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th style="text-align:center"><a href="{{ route('proveedores.create') }}" class="btn btn-link" data-toggle="tooltip" title="Agregar Producto" data-original-title="Ver Detalle"><i class="fas fa-plus"></i></a></th>
                        <th>Razon Social</th>
                        <th>CUIT</th>
                        <th>Telefono</th>
                        <th>estado</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($proveedores as $proveedor)
                        <tr>
                          <td style="text-align:center">{{$loop->iteration}}</td>
                          <td>{{ $proveedor->razon_social }}</td>
                          <td>{{ $proveedor->telefono }}</td>
                          <td>{{ $proveedor->cuit }}</td>
                          <td>{{ $proveedor->estado }}</td>
                          <td>
                            <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-link" data-toggle="tooltip" title="Ver Detalle Producto" data-original-title="Ver Detalle Cliente"><i class="far fa-eye" style="color:green; font-size: 20px;"></i></a>
                            <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-link" data-toggle="tooltip" title="Editar Producto" data-original-title="Editar Cliente"><i class="fas fa-pencil-alt" style="color:black; font-size: 20px;"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">

								<div class="form-group">

                  <th><a href="{{ route('proveedores.downloadPdf') }}" class="btn btn-success" data-toggle="tooltip" title="Reporte PDF" data-original-title="Reporte PDF">Imprimir PDF</a></th>

                </div>

							</div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>

        </div>
    </div>
</div>
@endsection
