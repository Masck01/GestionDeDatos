@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <!-- Comienza la tabla -->

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">

                <h3 class="card-title">Listado Configuracion de categorias</h3>
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
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 12px;">
                        <a href="{{ route('configuracioncategoria.create') }}" class="btn btn-link" data-toggle="tooltip" title="Agregar Configuracion" data-original-title="Ver Detalle"><i class="fas fa-plus" style="color: blue; font-size: 20px;"></i></a>
                        <a style="display:none;" href="#" class="btn btn-link" data-toggle="modal"  data-target="#ModalImportProduct" title="Importar Archivo Excel" data-original-title="Ver Detalle"><i class="fas fa-cloud-upload-alt" style="color: blue;  font-size: 20px;"></i></a>
                      </th>
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 92px; text-align:center;">Concepto</th>
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 92px; text-align:center;">Monto_fijo</th>
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 42px; text-align:center;">Monto_Variable</th>
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 42px; text-align:center;">Unidad</th>
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 42px; text-align:center;">Categoria</th>
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 42px; text-align:center;">Opciones</th>

                      </tr>
                    </thead>


                    <tbody>
                      @foreach ($configuracioncategorias as $config)
                        <tr>
                          <td style="text-align:center;">{{$loop->iteration}}</td>
                          <td style="text-align:center;">{{ $config->concepto()->first()->descripcion}} </td>
                          <td style="text-align:center;">{{ $config->montofijo}} </td>
                          <td style="text-align:center;">{{ $config->montovariable}}</td>
                          <td style="text-align:center;">{{ $config->unidad }}</td>
                          <td style="text-align:center;">{{ $config->categoria()->find($config->categoria_id)->descripcion}}</td>
                          <td>
                            <a href="{{ route('configuracioncategoria.edit', $config->id) }}" class="btn btn-link" data-toggle="tooltip" title="Editar empleado" data-original-title="Editar Producto" style="text-align:center;" ><i class="fas fa-pencil-alt" style="color:black; font-size: 20px;"></i></a>
                          </td>

                        </tr>
                      @endforeach
                    </tbody>

                  </table>

                  {{$configuracioncategorias->render()}}

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
