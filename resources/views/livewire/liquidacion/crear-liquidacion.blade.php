<div class="container d-flex flex-column justify-content-center pt-4">
    <div class="flex-grow-1">
        <div class="card card-secondary">
            <div class="card-header">
                <h1 class="display-4">Nueva Liquidacion</h1>
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
                        {{ $fecha_desde }}
                    </blockquote>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote" style="border-left: .2rem solid #2c82cd69">
                        <p class="h4">Hasta:
                        </p>
                        {{ $fecha_hasta ?? '' }}
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
                            <input type="month" class="form-control" id="month" wire:model="month"
                                wire:change="notify_fecha">
                        </div>
                        @error('month')
                            <div class="alert alert-danger" role="alert">
                                <p>Fecha requerida</p>
                            </div>
                        @enderror
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
                                    @if ($l->concepto()->first()->tipo == 'Haber')
                                        <td>{{ $l->montofijo ?? $l->montovariable }}</td>
                                        <td></td>
                                    @endif
                                    @if ($l->concepto()->first()->tipo == 'Retencion')
                                        <td></td>
                                        <td>{{ $l->montovariable }}</td>
                                    @endif
                                    {{-- Retenciones --}}
                                    {{-- Total Parcial --}}
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>Totales</th>
                            <th></th>
                            <th></th>
                            <th>{{ $total_haberes }}</th>
                            <th>{{ $total_retenciones }}</th>
                            <th>{{ $salario_neto }}</th>
                        </tfoot>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex justify-content-between mb-4">
        <a class="btn btn-info btn-lg" href="{{ route('liquidacion.index') }}" role="button">Volver</a>
        <a class="btn btn-success btn-lg text-white" role="button" wire:click.prevent="store">Guardar
            Liquidacion</a>
    </div>
</div>
</div>
@push('scripts')
    @livewireScripts
@endpush
