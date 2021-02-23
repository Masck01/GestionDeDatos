@extends('layouts.app')
@section('content')

    <div class="container d-flex flex-column justify-content-center pt-4">

        <div class="flex-grow-1">

            <div class="card card-secondary">

                <div class="card-header">

                    <h1 class="display-4">Nueva Liquidacion</h1>

                </div>

                <div class="card-body">
                    <!-- /.card-header -->

                    <form method="post" action="{{ route('liquidacion.store') }}" name="formulario">

                        {{ csrf_field() }}

                        <div class="input-group">
                            <label>Empleado: {{ $empleado->apellido }} {{ $empleado->nombre }}</label>
                            <input type="hidden" name="empleado_id" value=" {{ $empleado->id }}">
                        </div>

                        <div class="input-group">
                            <label>Periodo: @php  echo date('m', strtotime('-1 month')) . '/' . date('y')  @endphp</label>
                            <input type="hidden" name="periodo" value=" @php  echo date('m', strtotime('-1 month')) . '/' . date('y')@endphp">
                        </div>

                        <div class="input-group">
                            <label>Fecha y Hora: @php  echo date('d/m/y H:m:s') @endphp</label>
                        </div>

                        <div class="input-group">
                            <label>Desde: @php  echo '1/'.date('m', strtotime('-1 month')) . '/' . date('y') @endphp Hasta: @__raw_block_4__@</label>
                            <input type="hidden" name="fechaDesde" value="@php  echo '1/'.date('m', strtotime('-1 month')) . '/' . date('y') @endphp">
                            <input type="hidden" name="fechaHasta" value=" @php  echo '30/'.date('m', strtotime('-1 month')) . '/' . date('y') @endphp">
                        </div>

                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">

                                <div class="table-responsive">

                                    <table id="table"
                                        class="table table-striped table-bordered table-condensed table-hover">
                                        <thead style="background-color:#caf5a9">
                                            <th>#</th>
                                            <th>Concepto</th>
                                            <th>Unidades</th>
                                            <th>Haberes</th>
                                            <th>Retenciones</th>
                                            <th>Total</th>

                                        </thead>
                                        <tbody>
                                            @foreach ($configuracion_categoria as $config)
                                                <tr>
                                                    @php
                                                        $concepto_categoria = $conceptos->find($config->concepto_id);
                                                        $total_parcial = (($config->montofijo ?? -abs($config->montovariable)) * $config->unidad * $salario_basico) / 100;
                                                        $total_haberes = ($configuracion_categoria->skip(1)->sum('montofijo') * $salario_basico) / 100;
                                                        $total_retencion = -abs(($configuracion_categoria->skip(1)->sum('montovariable') * $salario_basico) / 100);
                                                        $total_neto = $salario_basico + $total_haberes + $total_retencion;
                                                    @endphp
                                                    {{-- # --}}
                                                    <td>{{ $loop->iteration }}</td>
                                                    {{-- Concepto --}}
                                                    <td>{{ $concepto_categoria->descripcion }}</td>
                                                    {{-- Unidades --}}
                                                    <td>{{ $config->unidad }}</td>
                                                    {{-- Haberes --}}
                                                    <td>{{ $config->montofijo }}</td>
                                                    {{-- Retenciones --}}
                                                    <td>{{ $config->montovariable }}</td>
                                                    {{-- Total Parcial --}}
                                                    @if ($loop->first)
                                                        <td></td>
                                                        @continue
                                                    @endif
                                                    <td>{{ $total_parcial }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>Totales</th>
                                            <th></th>
                                            <th></th>
                                            <th>{{ $total_haberes }}</th>
                                            <th>{{ $total_retencion }}</th>
                                            <th>{{ $total_neto }}</th>
                                        </tfoot>
                                        <tbody></tbody>
                                    </table>


                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>
        <div class="d-flex justify-content-between mb-4">
            <a class="btn btn-info btn-lg" href="{{ route('liquidacion.index') }}" role="button">Volver</a>
            <a class="btn btn-info btn-lg" href="{{ route('liquidacion.store') }}" role="button">L</a>
        </div>
    </div>



@endsection
