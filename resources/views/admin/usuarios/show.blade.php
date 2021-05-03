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
                  <p><b>Id usuario: </b>{{$user->id}}</p>
                  <p><b>Tipo de Usuario: </b>{{$user->tipousuario}}</p>
                  <p><b>Password: </b>{{$user->password}}</p>
                  <p><b>Username: </b>{{$user->username}}</p>

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
                      @foreach($rolesusuario as $rol)
                      <tr>
                      <td style="text-align:center;">{{$loop->iteration}} </td>
                      <td> {{$roles->find($rol->role_id)->name}} </td>
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
<div class="modal fade bd-example-modal-lg" id="ModalCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="titulo">Asignar Rol</h5>
               </div>
            <div class="modal-body">
                  <div class="card-body">

                <form method="POST" action="{{ route('roleuser.store')}}" role="form">
                  {{ csrf_field() }}
                  <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">

                        <label>Rol</label>

                        <input type="text" hidden value="{{$user->id}}" name="usuario_id">

                        <select class="form-control select2" style="width: 100%;" id="rolesusuario" name="rolesusuario">

                          @foreach ($roles as $role)

                          <option value="{{$role->id}}">{{$role->name}}</option>

                          @endforeach

                        </select>
                      </div>

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
