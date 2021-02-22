@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center">

        @if (Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif

        <!-- Comienza la tabla -->

        <div class="card card-secondary flex-grow-1">
            <div class="card-header">
                <h1 class="display-4">Liquidacion de Salarios</h1>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="text" name="table_search" id="searchTerm" class="form-control float-right"
                            placeholder="Buscar">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default" type="text"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="datos">
                    <thead>
                        <tr>
                            <th>
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#EmpleadoModal">
                                    <i class="fas fa-plus"></i></a>
                                </button>
                            </th>
                            <th>Empleado</th>
                            <th>Periodo</th>
                            <th>Salario Neto</th>
                            <th>Retenciones</th>
                            <th>Salario Bruto</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($liquidacion as $l)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $l->usuario->apellido }} {{ $l->usuario->nombre }}</td>
                                <td>{{ $l->periodo }}</td>
                                <td>AR$ {{ $l->salarioNeto }}</td>
                                <td>
                                    {{ $l->retenciones }}
                                </td>
                                <td>
                                    {{ $l->salario_bruto }}

                                </td>
                                <td>
                                    {{ $l->estado }}

                                </td>
                                <td>
                                    <a href="{{ route('liquidacion.show', $l->id) }}" class="btn btn-link"
                                        data-toggle="tooltip" title="Ver Detalle Venta"
                                        data-original-title="Ver Presupuesto"><i class="far fa-eye"
                                            style="color:green; font-size: 20px;"></i></a>
                                    <a href="{{ route('liquidacion.imprimir', $l->id) }}" class="btn btn-link"
                                        data-toggle="tooltip" title="Imprimir Comprobante"
                                        data-original-title="Imprimir Comprobante"><i class="fas fa-print"
                                            style="color:#578DA4; font-size: 20px;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


    <!-- Modal -->
    <div class="modal fade" id="EmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <livewire:empleado.lista-empleados />
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection
