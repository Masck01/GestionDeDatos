@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Compras</h1>
                </div>



              </div>
            </div><!-- /.container-fluid -->
          </section>

          @if(Session::has('error'))
                  <p class="alert alert-danger">{{ Session::get('error') }}</p>
          @endif

          <!-- Comienza la tabla -->

          <div class="row">
            <div class="col-12">
              <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Listado de Compras</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" id="searchTerm"  class="form-control float-right" placeholder="Buscar" onkeyup="doSearch()">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default" type="text" ><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="datos">
                    <thead>
                      <tr>
                      <th style="text-align:center;"><a href="{{ route('compras.create') }}" class="btn btn-link" data-toggle="tooltip" title="Nueva Compra" data-original-title="Generar Presupuesto"><i class="fas fa-plus"></i></a></th>
                          <th>Fecha Alta</th>
                          <th>Nro Factura</th>
                          <th>Tipo Proveedor</th>
                          <th>Razon social Proveedor</th>
                          <th>Cuit Proveedor</th>
                          <th>Total Bruto</th>
                          <th>IVA</th>
                          <th>Total Neto</th>
                          <th>Fecha de Compra</th>

                          <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($compras as $compra)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $compra->getFromDateAttribute($compra->fecha)}}</td>
                    <td>{{ $compra->nrofactura}}</td>
                    <td>{{ $compra->tipoproveedor }}</td>
                    <td>{{ Arr::get($compra,'proveedor.razon_social')}}</td>
                    <td>{{ Arr::get($compra,'proveedor.cuit')}}</td>
                    <td> AR$ {{ $compra->subtotalcompra }} </td>
                    <td> AR$ {{ $compra->ivacompra }} </td>
                    <td> AR$ {{ $compra->total }} </td>
                    <td> {{ $compra->fechacompra }} </td>



                    <td>
                        <a href="{{ route('compras.show', $compra->id) }}"  class="btn btn-link" data-toggle="tooltip" title="Ver Detalle Compra" data-original-title="Ver Presupuesto"><i class="far fa-eye" style="color:green; font-size: 20px;"></i></a>
                        <a href="{{ route('pdf.imprimirRemito', $compra->id) }}" class="btn btn-link" data-toggle="tooltip" title="Imprimir Comprobante" data-original-title="Imprimir Comprobante"><i class="fas fa-print" style="color:#578DA4; font-size: 20px;"></i></a>
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
          </div>
          <div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">

            <div class="form-group">

            <th><a href="{{ route('compras.downloadPdf') }}" class="btn btn-success" data-toggle="tooltip" title="Reporte PDF" data-original-title="Reporte PDF">Imprimir PDF</a></th>

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
