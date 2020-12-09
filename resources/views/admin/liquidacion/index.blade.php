@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          @if(Session::has('error'))
                  <p class="alert alert-danger">{{ Session::get('error') }}</p>
          @endif

          <!-- Comienza la tabla -->

          <div class="row">
            <div class="col-12">
              <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Liquidacion de Salarios</h3>

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
                          <th>#</th>
                          <th>Empleado</th>
                          <th>Periodo</th>
                          <th>Salario Neto</th>
                          <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($liquidacion as $liqui)
                  <tr>
                    <td style="text-align: center">{{$loop->iteration}}</td>
                    <td>{{ $liqui->usuario->apellido}} {{ $liqui->usuario->nombre}}</td>   
                    <td>{{ $liqui->periodo}}</td>                 
                    <td>AR$ {{ $liqui->salarioNeto}}</td>
                    <td>
                        <a href="{{ route('liquidacion.show', $liqui->id) }}"  class="btn btn-link" data-toggle="tooltip" title="Ver Detalle Venta" data-original-title="Ver Presupuesto"><i class="far fa-eye" style="color:green; font-size: 20px;"></i></a>
                        <a href="{{ route('liquidacion.imprimir', $liqui->id) }}" class="btn btn-link" data-toggle="tooltip" title="Imprimir Comprobante" data-original-title="Imprimir Comprobante"><i class="fas fa-print" style="color:#578DA4; font-size: 20px;"></i></a>
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