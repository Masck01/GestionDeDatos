@extends('layouts.app')
@section('content')

<div class="d-flex container flex-column mt-4">
    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="display-4">Liquidacion</h1>
        </div>
        <div class="card-group">
            <div class="card-body">
                <blockquote class="blockquote" style="border-left: .2rem solid #2c82cd69">
                    <p class="h4">Apellido:
                    </p>

                    {{ $empleado->apellido }}
                </blockquote>
            </div>
            <div class="card-body">
                <blockquote class="blockquote" style="border-left: .2rem solid #2c82cd69">
                    <p class="h4">Nombre:
                    </p>
                    {{ $empleado->nombre }}
                </blockquote>
            </div>
            <div class="card-body">
                <blockquote class="blockquote" style="border-left: .2rem solid #2c82cd69">
                    <p class="h4">Legajo:
                    </p>

                    {{ $empleado->id }}
                </blockquote>
            </div>
            <div class="card-body">
                <blockquote class="blockquote" style="border-left: .2rem solid #2c82cd69">
                    <p class="h4">Desde:
                    </p>
                    {{ $liquidacion->fecha_desde }}
                </blockquote>
            </div>
            <div class="card-body">
                <blockquote class="blockquote" style="border-left: .2rem solid #2c82cd69">
                    <p class="h4">Hasta:
                    </p>
                    {{ $liquidacion->fecha_hasta }}
                </blockquote>
            </div>
            <div class="card-body d-flex">
                <blockquote class="blockquote" style="border-left: .2rem solid #2c82cd69">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <p>Periodo:</p>
                            </span>
                        </div>
                        <p class="form-control">

                            {{ $liquidacion->periodo_liquidacion }}
                        </p>
                    </div>
                </blockquote>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                        <th>#</th>
                        <th>Concepto</th>
                        <th>Unidades</th>
                        <th>Haberes</th>
                        <th>Retenciones</th>
                        <th>Total</th>

                    </thead>
                    <tbody>
                        @foreach ($linea_liquidacion as $l)
                        <tr>
                            {{-- # --}}
                            <td>{{ $loop->iteration }}</td>
                            {{-- Concepto --}}
                            <td>{{ $l->concepto()->first()->descripcion }}</td>
                            {{-- Unidades --}}
                            <td>{{ $l->unidad }}</td>
                            {{-- Haberes --}}
                            <td>
                                @if ($l->concepto()->first()->tipo == 'Haber')
                                {{ $l->montofijo ?? $l->montovariable }}
                                @endif
                            </td>
                            <td>
                                @if ($l->concepto()->first()->tipo == 'Retencion')
                                {{ $l->montovariable ?? $l->montofijo }}
                                @endif
                            </td>
                            {{-- Total Parcial --}}
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th>Totales</th>
                        <th></th>
                        <th></th>
                        <th>{{ $linea_liquidacion->first()->liquidacion()->first()->salario_neto + $linea_liquidacion->first()->liquidacion()->first()->retenciones}}</th>
                        <th>{{ $linea_liquidacion->first()->liquidacion()->first()->retenciones }}</th>
                        <th>{{ $linea_liquidacion->first()->liquidacion()->first()->salario_neto }}</th>
                    </tfoot>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
