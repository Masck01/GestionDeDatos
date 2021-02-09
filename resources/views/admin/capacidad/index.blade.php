@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          @if ( count($errors) > 0 )

            <div class="alert alert-danger">
              
              <ul>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
            
            </div>
          
          @endif

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Listado de Capacidades</h3>
            </div>
            <table class="table table-hover text-nowrap" id="tablecliente">
              <thead>
                <tr>
                  <th style="text-align:center;">                  
                  <button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalCliente">
                  <i class="fas fa-plus"></i></a>
                  </button>
                  </th>
                  <th style="text-align:center;">Cantidad</th>
                  <th style="text-align:center;">Estado</th>
                  <th colspan="2" style="text-align:center;">Opciones</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($capacidad as $cat)
              <tr>
                    <td style="text-align:center;">{{$loop->iteration}}</td>
                    <td style="display:none; text-align:center;">{{$cat->id}} </td>
                    <td style="text-align:center;">{{$cat->cantidad}} </td>
                    <td style="text-align:center;">{{$cat->estado}} </td>
                    <td style="text-align:right;">
                      <a href="#" class="btn btn-link" data-toggle="modal" data-target="#modal" onclick="rowSeleccion()" title="Editar Capacidad" data-original-title="Editar Cliente"><i class="fas fa-pencil-alt" style="color:black; font-size: 20px;"></i>
                    </td>
                    <td>
                      <form class="" action="{{ route('capacidades.eliminar', $cat->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" onclick="return confirm('¿Desea eliminar esta capacidad?')"  class="btn btn-link" data-toggle="tooltip" title="Desactivar Categoria" data-original-title="Editar Cliente"><i class="fas fa-trash-alt" style="color:red; font-size: 20px;"></i></button>
                      </form>
                    </td> 
              </tr>       
              @endforeach   
              </tbody>    
            </table>
            {{$capacidad->render()}}
          </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<!-- Modal Agregar Capacidad-->

<div class="modal fade bd-example-modal-lg" id="ModalCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
        	<h5 class="modal-title" id="titulo">Agregar Capacidad</h5>		
     	    </div>
          <div class="modal-body">
	            <div class="card-body">

              <form method="post" action="{{ route('capacidades.store')}}" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">

                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Cantidad</label>
                      <div class="input-group">

                        <div class="input-group-prepend">
                          
                          <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                        </div>
                          
                        <input type="text" class="form-control" placeholder="Enter ..." id="cantidad" name="cantidad">

                      </div>
                     
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Estado</label>
                      <div class="input-group">

                        <div class="input-group-prepend">
                          
                          <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                        </div>
                          
                        <input type="text" class="form-control" placeholder="Enter ..." id="estado" name="estado">

                      </div>
                     
                    </div>
                  </div>

                </div>
                  
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <br>
                      <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                  </div>
                </div>


              </form>  
                  
              </div>
            </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link" data-dismiss="modal"><i class="fas fa-times" style="color:red; font-size: 30px;"></i></button>
      </div>
    </div>
  </div>
</div>


<!-- FIN Modal Agregar Capacidad-->	


<!-- Modal Actualizar Capacidad-->

<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
        	<h5 class="modal-title" id="tituloUpdate">Actualizar Capacidad</h5>		
     	    </div>
          <div class="modal-body">
	            <div class="card-body">
              
              <form method="post" action="{{ route('capacidades.update')}}" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <input type="hidden" class="form-control" placeholder="Enter ..." id="idUpdate" name="id">
                      <label>Cantidad</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombreUpdate" name="cantidad">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Estado</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="estadoUpdate" name="estado">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <br>
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                  </div>
                </div>


              </form>  
                  
              </div>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- FIN Modal Actualizar Contacto-->	
@endsection

@push ('scripts')

<script>

function rowSeleccion(){
  $("table tbody tr").click(function() {
		 		var filaId= $(this).find("td:eq(1)").text();
		 		var filaNombre= $(this).find("td:eq(2)").text();
	     	var filaEstado = $(this).find("td:eq(3)").text();
        $("#idUpdate").val(filaId);
        $("#nombreUpdate").val(filaNombre);
        $("#estadoUpdate").val(filaEstado);
			});
		}

    </script>
    
@endpush