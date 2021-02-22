<div class="d-flex card">
    <div class="card-header">

        <h3 class="card-title">Listado de Empleados</h3>
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
    <div class="card-body table-responsive p-4">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 12px;">
                        <a href="{{ route('empleados.create') }}" class="btn btn-link"><i class="fas fa-plus"
                                style="color: blue; font-size: 20px;"></i></a>
                    </th>
                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 92px; text-align:center;">
                        Nombre</th>
                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 92px; text-align:center;">
                        email</th>
                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 42px; text-align:center;">
                        Cuit</th>
                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 42px; text-align:center;">
                    </th>
                </tr>
            </thead>


            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td style="text-align:center;">{{ $loop->iteration }}</td>
                        <td style="text-align:center;">{{ $empleado->apellido }} {{ $empleado->nombre }}</td>
                        <td style="text-align:center;">{{ $empleado->email }}</td>
                        <td style="text-align:center;">{{ $empleado->cuit }}</td>
                        <td>
                            <a href="{{ route('empleados.show', $empleado->id) }}" class="btn btn-link"
                                data-toggle="tooltip" title="Ver empleado" data-original-title="Ver Detalle"
                                style="text-align:center;"><i class="far fa-eye"
                                    style="color:green; font-size: 20px;"></i></a>
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-link"
                                data-toggle="tooltip" title="Editar empleado" data-original-title="Editar Producto"
                                style="text-align:center;"><i class="fas fa-pencil-alt"
                                    style="color:black; font-size: 20px;"></i></a>
                            <a href="{{ route('liquidacion.create', $empleado->id) }}" class="btn btn-link"><i class="fa fa-hand-holding-usd"
                                    aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        {{ $empleados->render() }}

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
