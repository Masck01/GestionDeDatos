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
                            <input type="month" class="form-control" id="month" wire:model="month" wire:change="notify_fecha">
                        </div>
                        @error('month')
                        <div class="alert alert-danger" role="alert">
                            <p>Fecha requerida</p>
                        </div>
                        @enderror
                    </blockquote>
                    <blockquote class="blockquote align-item-end" style="border-left: .2rem solid #2c82cd69; margin-left:20rem">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#conceptoId">
                            Agregar concepto
                        </button>


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
                                    {{ $l->montovariable }}
                                    @endif
                                </td>
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
                        <tbody>
                            @foreach ($nuevos_conceptos as $nc)
                            <tr>
                                <!-- # Iterador -->
                                <td>
                                    {{$loop->iteration + $linea_liquidacion->count()}}
                                </td>
                                <!-- Concepto    -->
                                <td>
                                    {{$conceptos->find($nc['concepto_id'])->descripcion}}
                                </td>
                                <!-- Unidad -->
                                <td>
                                    {{$nc['unidad']}}
                                </td>
                                <!-- Haber -->
                                <td>
                                    @if ($conceptos->find($nc['concepto_id'])->tipo == 'Haber')
                                    {{$nc['montofijo'] ?? $nc['montovariable']}}
                                    @endif
                                </td>
                                <!-- Retencion -->
                                <td>
                                    @if ($conceptos->find($nc['concepto_id'])->tipo == 'Retencion')
                                    {{$nc['montofijo'] ?? $nc['montovariable']}}
                                    @endif
                                </td>
                                <td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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

    <div wire:ignore.self class="modal fade" id="conceptoId" tabindex="-1" role="dialog" aria-labelledby="conceptoTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Conceptos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        @if (Session::has('concepto agregado'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{Session::get('concepto agregado')}}</strong>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="">Agregar concepto</label>
                            {!!Form::select('conceptos',$seleccionar_concepto,'0',['class'=>'form-control', 'wire:model.stop'=>'concepto_id'])!!}
                            <small class="form-text text-muted">{{$conceptos->find($concepto_id)->tipo ?? ''}}</small>
                        </div>
                        <div class="form-group">
                            <label for="">Monto fijo</label>
                            <input type="number" class="form-control" wire:model="montofijo">
                            <small class="form-text text-muted">@error('montofijo')
                                {{$message}}
                                @enderror</small>

                        </div>
                        <div class="form-group">
                            <label for="">Monto variable</label>
                            <input type="number" class="form-control" wire:model="montovariable">
                            <small class="form-text text-muted">@error('montovariable')
                                {{$message}}
                                @enderror</small>
                        </div>
                        <div class="form-group">
                            <label for="">Unidades</label>
                            <input type="number" class="form-control" wire:model="unidad" value=1>
                            <small class="form-text text-muted">@error('unidad')
                                {{$message}}
                                @enderror</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="agregar_concepto">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
@livewireScripts;

@endpush
