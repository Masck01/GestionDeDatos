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
              <h3 class="card-title">Listado de Marcas</h3>
            </div>
            <table class="table table-hover text-nowrap" id="tablecliente">
              <thead>
                <tr>
                  <th style="text-align:center;">                  
                  <button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalCliente">
                  <i class="fas fa-plus"></i></a>
                  </button>
                  </th>
                  <th style="text-align:center;">Nombre</th>
                  <th style="text-align:center;">Estado</th>
                  <th colspan="2" style="text-align:center;">Opciones</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($marcas as $marca)
              <tr>
                    <td style="text-align:center;">{{$loop->iteration}}</td>
                    <td style="display:none; text-align:center;">{{$marca->id}} </td>
                    <td style="text-align:center;">{{$marca->nombre}} </td>
                    <td style="text-align:center;">{{$marca->estado}} </td>
                    <td style="text-align:right;">
                      <a href="#" class="btn btn-link" data-toggle="modal" data-target="#modal" onclick="seleccionarContacto()" title="Editar Marca" data-original-title="Editar Cliente"><i class="fas fa-pencil-alt" style="color:black; font-size: 20px;"></i>
                    </td>
                    <td>
                      @if ($marca->estado == 'Activo')
                      <form class="" action="{{ route('marcas.eliminar', $marca->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" onclick="return confirm('Esta acción no podrá deshacerse. ¿Desactivar Marca?')"  class="btn btn-link" data-toggle="tooltip" title="Desactivar Categoria" data-original-title="Editar Cliente"><i class="fas fa-trash-alt" style="color:red; font-size: 20px;"></i></button>
                      </form>
                      
                      @else

                      <form class="" action="{{ route('marcas.activar', $marca->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" onclick="return confirm('Esta acción no podrá deshacerse. ¿Activar Marca?')"  class="btn btn-link" data-toggle="tooltip" title="Activar Categoria" data-original-title="Editar Cliente"><i class="fas fa-check" style="color:green; font-size: 20px;"></i></button>
                      </form>


                      @endif
                    </td> 
              </tr>       
              @endforeach   
              </tbody>    
            </table>
            {{$marcas->render()}}
          </div>
                </div>
              </div>
            </div>
          </div>


        </div>
    </div>
</div>

<!-- Modal Agregar Marca-->

<div class="modal fade bd-example-modal-lg" id="ModalCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
        	<h5 class="modal-title" id="titulo">Agregar Marca</h5>		
     	    </div>
          <div class="modal-body">
	            <div class="card-body">

              <form method="post" action="{{ route('marcas.store')}}" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">

                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Nombre</label>
                      <div class="input-group">

                        <div class="input-group-prepend">
                          
                          <span class="input-group-text" id="basic-addon1"><i class="far fa-keyboard"></i></span>

                        </div>
                          
                        <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre">

                      </div>
                     
                    </div>
                  </div>

                  <br>

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


<!-- FIN Modal Agregar Contacto-->	


<!-- Modal Actualizar Contacto-->

<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
        	<h5 class="modal-title" id="tituloUpdate">Actualizar Marca</h5>		
     	    </div>
          <div class="modal-body">
	            <div class="card-body">
              
              <form method="post" action="{{ route('marcas.update')}}" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <input type="hidden" class="form-control" placeholder="Enter ..." id="idUpdate" name="id">
                      <label>Nombre</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombreUpdate" name="nombre">
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

function seleccionarContacto(){
  $("table tbody tr").click(function() {
		 		var filaid= $(this).find("td:eq(1)").text();
	     	var filaNombre = $(this).find("td:eq(2)").text();
        $("#idUpdate").val(filaid);
        $("#nombreUpdate").val(filaNombre);
			});
		}

    </script>
    
@endpush