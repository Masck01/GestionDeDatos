@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Detalle del Usuario</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <p><b>Nombre y Apellido: </b>{{$usuario->apellido}} {{$usuario->nombre}}</p>
                  <p><b>CUIT / CUIL: </b>{{$usuario->cuit_cuil}}</p>
                  <p><b>E-mail: </b>{{$usuario->email}}</p>
                  <p><b>Telefono Celular: </b>{{$usuario->telefino_celular}}</p>
                  <p><b>Telefono Fijo: </b>{{$usuario->telefino_fijo}}</p>
                  <p><b>Domicilio: </b>{{$usuario->domicilio}}</p>
                  <p><b>Tipo de Usuario </b>{{$usuario->tipo}}</p>

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Grupo Familiar</h3>
            </div>
            <table class="table table-hover text-nowrap" id="tablecliente">
              <thead>
                <tr>
                  <th style="text-align:center;">                  
                  <button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalCliente">
                  <i class="fas fa-plus"></i></a>
                  </button>
                  </th>
                  <th>Nombre</th>
                  <th>Dni</th>
                  <th>Parentesco</th>
                  <th>

                  </th>
                </tr>
              </thead>
              <tbody>
              @foreach($clientes as $con)
              <tr>
              <td style="text-align:center;">{{$con->id}} </td>
              <td> {{$con->nombre}} </td>
              <td>{{$con->dni}} </td>
              <td>{{$con->parentesco}} </td>
              </tr>       
              @endforeach   
              </tbody>    
            </table>
          </div>
                </div>
              </div>
            </div>
          </div>


        </div>
    </div>
</div>

<!-- Modal Agregar Grupo Familiar-->

<div class="modal fade bd-example-modal-lg" id="ModalCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
        	<h5 class="modal-title" id="titulo"> Agregar Grupo Familiar</h5>		
     	    </div>
          <div class="modal-body">
	            <div class="card-body">

              <form method="post" action="{{ route('familias.store')}}" role="form">
                {{ csrf_field() }}
                <div class="row">
                <input type="hidden" class="form-control" placeholder="Enter ..." id="id" name="id" value="{{$usuario->id}}">

                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Fecha Nacimiento</label>
                      <input type="date" class="form-control" placeholder="Enter ..." id="telefonos" name="fechaNacimiento">
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Dni</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="email" name="dni">
                    </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Parentesco</label>
                      <select class="form-control select2"  id="parentesco" name="parentesco">
                                            
                        <option value="Padre">Padre</option>
                        <option value="Madre">Madre</option>
                        <option value="Hijo/Hija">Hijo/Hija</option>
                        <option value="Hijo/Hija">Hermano</option>

                     </select>
                    </div>
                  </div>
                  
                </div>


                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
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


<!-- Modal  Actualizar Grupo Familiar-->

<div class="modal fade bd-example-modal-lg" id="ModalClienteUpdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
        	<h5 class="modal-title" id="tituloUpdate"> Actualizar Grupo Familiar</h5>		
     	    </div>
          <div class="modal-body">
	            <div class="card-body table-responsive p-0">

              <form method="post" action="{{ route('familias.update')}}" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                <input type="hidden" class="form-control" placeholder="Enter ..." id="id" name="id" value="{{$usuario->id}}">
                <input type="hidden" class="form-control" placeholder="Enter ..." id="idUpdate" name="idContacto">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombreUpdate" name="nombre">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tel&eacute;fonos</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefonosUpdate" name="telefonos">
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="emailUpdate" name="email">
                    </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Sector</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="sectorUpdate" name="sector">
                    </div>
                  </div>
                  
                </div>


                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Agregar</button>
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
		 		var filaid= $(this).find("td:eq(0)").text();
	     	    var filaNombre = $(this).find("td:eq(1)").text();
				var filaTelefono = $(this).find("td:eq(2)").text();
  			    var filaEmail = $(this).find("td:eq(3)").text();
                var filaSector= $(this).find("td:eq(4)").text();
                $("#idUpdate").val(filaid);
                $("#nombreUpdate").val(filaNombre);
				$("#sectorUpdate").val(filaSector);
				$("#telefonosUpdate").val(filaTelefono);
				$("#emailUpdate").val(filaEmail);
			});
		}

    </script>
    
@endpush