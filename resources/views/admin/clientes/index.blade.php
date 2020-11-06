@extends('layouts.app')
@section('content')
<div class="container">
  
  <div class="row justify-content-center">
    
    <div class="col-md-12">

      <section class="content-header">
            
        <div class="container-fluid">
              
          <div class="row mb-2">
              
              <div class="col-sm-6">
                
                <h1>Clientes</h1>
              
              </div>

          </div>
        
        </div>
      
      </section>
      
        <div class="row">
        
          <div class="col-12">
              
              <div class="card">
                
                <div class="card-header">
                  
                  <h3 class="card-title">Listado de Clientes</h3>

                    <div class="card-tools">
                        
                        <div class="input-group input-group-sm" style="width: 250px;">
                            
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar">

                              <div class="input-group-append">
                                
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                              
                              </div>
                        </div>

                    </div>

                </div>
                
                <div class="card-body table-responsive p-0">
                    
                    <table class="table table-hover text-nowrap">
                        
                        <thead>
                          <tr>
                              <th style="text-align:center;">                     
                                <a href="{{ route('clientes.create') }}" class="btn btn-link" data-toggle="tooltip" title="Agregar Cliente" data-original-title="Agregar Cliente"><i class="fas fa-plus"></i></a>                                                 
                              </th>
                              <th>Nombre</th>
                              <th>CUIT/CUIL</th>
                              <th>Ciudad</th>
                              <th>Provincia</th>
                              <th>
                              <a href="{{ route('cliente.downloadPdf') }}" class="btn btn-link" data-toggle="tooltip" title="Reporte PDF" data-original-title="Reporte PDF"><i class="fas fa-file-pdf" style="color:red; font-size: 20px;"></i></a>
                              </th>
                          </tr>

                        </thead>
                        
                        <tbody>
                          @foreach ($clientes as $cliente)
                          <tr>
                              <td style="text-align:center;">{{$loop->iteration}}</td>
                              <td>{{ $cliente->nombre_Fantasia }}</td>
                              <td>{{ $cliente->cuit_cuil }}</td>
                              <td>{{ $cliente->ciudad }}</td>
                              <td>{{ $cliente->provincia->nombre }}</td>
                              <td>
                                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-link" data-toggle="tooltip" title="Ver Detalle Cliente" data-original-title="Ver Detalle Cliente"><i class="far fa-eye" style="color:green; font-size: 20px;"></i></a>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-link" data-toggle="tooltip" title="Editar Cliente" data-original-title="Editar Cliente"><i class="fas fa-pencil-alt" style="color:black; font-size: 20px;"></i></a>
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
                              <th></th>
                          </tr>

                        </tfoot>
                    
                    </table>
                    
                    {{$clientes->render()}}

                </div>

              </div>

          </div>

        </div>

    </div>

  </div>

</div>

@endsection
