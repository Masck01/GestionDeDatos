@extends('layouts.app')
@section('content')

<div class="container">

  <div class="row justify-content-center">
    
    <div class="col-md-12">
        
        <div class="row">
          
          <div class="col-12">
            
            <div class="card">
              
              <div class="card-header">
                
                  <h3 class="card-title">Listado de Sucursales</h3>
                
                  <div class="card-tools">
                        
                      <div class="input-group input-group-sm" style="width: 250px;">
                        
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar">

                        <div class="input-group-append">

                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        
                        </div>

                      </div>

                  </div>

              </div>

                <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                  
                  <table class="table table-hover text-nowrap">
                    
                      <thead>
                        
                        <tr>
                            <th style="text-align:center;">                     
                              <a href="{{ route('depositos.create') }}" class="btn btn-link" data-toggle="tooltip" title="Agregar Deposito" data-original-title="Agregar Deposito"><i class="fas fa-plus"></i></a>                  
                            </th>
                            <th>Razon social</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Cuit</th> 
                            <th>Estado</th> 

                            <th></th>                                     
                        </tr>

                      </thead>

                      <tbody>
                        @foreach ($depositos as $deposito)
                        <tr>
                            <td style="text-align:center;">{{ $deposito->id}}</td>
                            <td>{{ $deposito->razon_social }}</td>
                            <td>{{ $deposito->telefono }}</td>
                            <td>{{ $deposito->direccion }}</td>
                            <td>{{ $deposito->cuit }}</td>
                            <td>{{ $deposito->estado }}</td>
                            <td>
                              <a href="{{ route('depositos.show', $deposito->id) }}" class="btn btn-link" data-toggle="tooltip" title="Ver Detalle" data-original-title="Ver Detalle"><i class="far fa-eye" style="color:green; font-size: 20px;"></i></a>
                              <a href="{{ route('depositos.edit', $deposito->id) }}" class="btn btn-link" data-toggle="tooltip" title="Editar Deposito" data-original-title="Editar Producto"><i class="fas fa-pencil-alt" style="color:black; font-size: 20px;"></i></a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>

                  </table>
                  {{ $depositos->render() }}</td>
              </div>
               
            </div>
             
          </div>

        </div>

    </div>

  </div>

</div>
@endsection
