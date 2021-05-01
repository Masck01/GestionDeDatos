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
                  <p><b>Id usuario: </b>{{$usuario->id}}</p>
                  <p><b>Tipo de Usuario: </b>{{$usuario->tipousuario}}</p>
                  <p><b>Password: </b>{{$usuario->password}}</p>
                  <p><b>Username: </b>{{$usuario->username}}</p>

                  <div class="card card-secondary">
                    <div class="card-header">
                      <h3 class="card-title">Roles</h3>
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
                          <th>

                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($roles as $rol)
                      <tr>
                      <td style="text-align:center;">{{$rol->id}} </td>
                      <td> {{$rol->id}} </td>
                      <td>
                        <button class="btn btn-link" data-toggle="modal" data-target="#ModalClienteUpdate" title="Editar empleado" data-original-title="Editar Producto" style="text-align:center;" ><i class="fas fa-pencil-alt" style="color:black; font-size: 20px;"></i></a>
                      </td>
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
</div>

<!-- Modal Agregar Grupo Familiar-->

<!-- FIN Modal Agregar Contacto-->


<!-- Modal  Actualizar Grupo Familiar-->


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
