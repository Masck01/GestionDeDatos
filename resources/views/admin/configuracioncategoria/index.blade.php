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
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 92px; text-align:center;">Monto_fijo</th>
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 42px; text-align:center;">Monto_Variable</th>
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 42px; text-align:center;">Unidad</th>
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 42px; text-align:center;">Concepto_id</th>
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 42px; text-align:center;">Categoria_id</th>
                      <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 42px; text-align:center;">Opciones</th>

                      </tr>
                    </thead>


                    <tbody>
                      @foreach ($configuracioncategorias as $config)
                        <tr>
                          <td style="text-align:center;">{{$loop->iteration}}</td>
                          <td style="text-align:center;">{{ $config->montofijo}} </td>
                          <td style="text-align:center;">{{ $config->montovariable}}</td>
                          <td style="text-align:center;">{{ $config->unidad }}</td>
                          <td style="text-align:center;">{{ $config->concepto_id }}</td>
                          <td style="text-align:center;">{{ $config->categoria_id }}</td>
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

<!-- Modal Importar Producto-->

<div class="modal fade bd-example-modal-lg" id="ModalImportProduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

          <div class="modal-header">
        	  <h5 class="modal-title" id="tituloUpdate">Carga de Productos</h5>

              @if(Session::has('error'))

                <p class="text-danger">{{Session::get('error')}}</p>

              @endif

              @if(Session::has('message'))

                <p class="text-info">{{Session::get('message')}}</p>

              @endif

     	    </div>

          <div class="modal-body">

          <p>Presione <a href="{{ route('productos.download') }}">Aqui</a> para descargar la plantilla a completar</p>

          <p>Antes de realizar la carga es importante que:</p>
          <p>1) No deje Columnas Vacias</p>
	        <p>2) Borrar la fila de Encabesado</p>
            <div class="card-body table-responsive p-0">

              <form action="{{route('productos.importar.excel')}}" method="post" enctype="multipart/form-data">

                    @csrf

                <div class="row">

                    <div class="col-xs-24 col-sm-24 col-md-12 col-lg-12 col-xl-12">

                      <div class="form-group">
                        <label>Nombre</label>
                        <input type="file" class="form-control" name="file">
                      </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                      <button type="submit" class="btn btn-primary"><i class="fas fa-cloud-upload-alt"></i></button>
                      </div>

                    </div>

                </div>

              </form>

            </div>

            <div class="modal-footer">
                <div class="form-group">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i></button>
                </div>
             </div>

          </div>

      </div>

    </div>

</div>

<!-- FIN Modal Importar-->

@endsection
