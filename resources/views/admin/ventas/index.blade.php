@extends('layouts.app')
@section('content')
<div class="container">

  <div class="row justify-content-center">

      <div class="col-md-12">

        <section class="content-header">

          <div class="container-fluid">

            <div class="row mb-2">

              <div class="col-sm-6">

                <h1>Ventas</h1>

              </div>

            </div>

          </div>

        </section>

        @if(Session::has('error'))
                  <p class="alert alert-danger">{{ Session::get('error') }}</p>
          @endif

        <div class="row">

          <div class="col-12">

            <div class="card">

              <div class="card-header">

                <h3 class="card-title">Listado de Ventas</h3>

                  <div class="card-tools">

                    <div class="input-group input-group-sm" style="width: 250px;">

                      <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar" id="searchTerm"  onkeyup="doSearch()">

                      <div class="input-group-append">

                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>

                      </div>

                    </div>

                  </div>

              </div>

              <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap" id="datos">

                  <thead>

                    <tr>
                      <th style="text-align:center;"><a href="{{ route('ventas.create') }}" class="btn btn-link" data-toggle="tooltip" title="Nueva Venta" data-original-title="Generar Presupuesto"><i class="fas fa-plus"></i></a></th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Tipo Cliente</th>
                      <th>Razon social Cliente</th>
                      <th>Cuit Cliente</th>
                      <th>Total Bruto</th>
                      <th>IVA</th>
                      <th>Total Neto</th>
                      <th>Estado</th>
                    </tr>

                  </thead>

                  <tbody>
                      @foreach ($ventas as $venta)

                    <tr>
                        <td style="text-align:center;">{{$loop->iteration}}</td>
                        <td>{{ $venta->getFromDateAttribute($venta->fecha) }}</td>
                        <td>{{ $venta->getFromHoraAttribute($venta->hora) }}</td>
                        <td>{{ $venta->tipocliente}}</td>
                        <td>{{ Arr::get($venta,'cliente.razon_social')}}</td>
                        <td>{{ Arr::get($venta,'cliente.Cuit')}}</td>
                        <td>AR$ {{ $venta->subtotalventa }}  </td>
                        <td>AR$ {{ $venta->iva }}  </td>
                        <td> AR$ {{ $venta->total }} </td>
                        <td>{{ $venta->estado}}</td>

                        <td>
                          <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-link" data-toggle="tooltip" title="Ver Detalle Venta" data-original-title="Ver Presupuesto"><i class="far fa-eye" style="color:green; font-size: 20px;"></i></a>
                          <a href="{{route('ventas.imprimir', $venta->id)}}"class="btn btn-link" data-toggle="tooltip" title="Imprimir Comprobante" data-original-title="Imprimir Comprobante"><i class="fas fa-print" style="color:#578DA4; font-size: 20px;"></i></a>
                          @if($venta->estado == 'Impago')
                          <a href="{{route('venta.pague', $venta->id)}}"class="btn btn-link" data-toggle="tooltip" title="Pagar Venta" data-original-title="Imprimir Comprobante"> <i class="fas fa-money-bill-wave" style="color:green"></i></a>
                          @endif
                        </td>

                    </tr>

                      @endforeach
                  </tbody>

                  <tfoot>

                    <tr>
                        <th</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                  </tfoot>

                </table>

                {{$ventas->render()}}

              </div>

              <div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">

								<div class="form-group">

                  <th><a href="{{ route('ventas.downloadPdf') }}" class="btn btn-success" data-toggle="tooltip" title="Reporte PDF" data-original-title="Reporte PDF">Imprimir PDF</a></th>

                </div>

				</div>
            </div>

          </div>

          </div>

        </div>

    </div>

</div>
@endsection


@push ('scripts')
<script>
function doSearch(){
            const tableReg = document.getElementById('datos');
            const searchText = document.getElementById('searchTerm').value.toLowerCase();
            let total = 0;

            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }

                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            }

            // mostramos las coincidencias
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            if (searchText == "") {
                lastTR.classList.add("hide");
            }
    }

  </script>
@endpush
