@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Detalle del Empleado</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <p><b>Nombre y Apellido: </b>{{$empleado->apellido}} {{$empleado->nombre}}</p>
                  <p><b>CUIT: </b>{{$empleado->cuit}}</p>
                  <p><b>E-mail: </b>{{$empleado->email}}</p>
                  <p><b>Telefono Celular: </b>{{$empleado->telefono_celular}}</p>
                  <p><b>Telefono Fijo: </b>{{$empleado->telefono_fijo}}</p>
                  <p><b>Domicilio: </b>{{$empleado->domicilio}}</p>
                  <p><b>Estado </b>{{$empleado->estado}}</p>

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
              @foreach($grupofamiliares as $grupofamilia)
              <tr>
              <td style="text-align:center;">{{$grupofamilia->id}} </td>
              <td> {{$grupofamilia->nombre}} </td>
              <td>{{$grupofamilia->dni}} </td>
              <td>{{$grupofamilia->parentesco}} </td>
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
                <input type="hidden" class="form-control" placeholder="Enter ..." id="id" name="id" value="{{$empleado->id}}">

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="apellido" name="apellido"  >
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre">
                    </div>
                  </div>
                </div>

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                          <label>Dni</label>
                          <input type="text" class="form-control" placeholder="Enter ..." id="dni" name="dni">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label>Fecha Nacimiento</label>
                            <input type="date" class="form-control" placeholder="Enter ..." id="fecha_Nacimiento" name="fecha_Nacimiento">
                        </div>
                    </div>
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
                    <input type="hidden" class="form-control" placeholder="Enter ..." id="idEmpleado" name="idEmpleado" value="{{$empleado->empleado_id}}">
                <input type="hidden" class="form-control" placeholder="Enter ..." id="idUpdate" name="id" value={{$grupofamilia->id}}>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombreUpdate" name="nombre" value={{$grupofamilia->nombre}}>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="apellidoUpdate" name="apellido"  value={{$grupofamilia->apellido}}>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Fecha de Nacimiento</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="fecha_NacimientoUpdate" name="fecha_Nacimiento" value={{$grupofamilia->fecha_nacimiento}}>
                    </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                          <label>Parentesco</label>
                          <select class="form-control select2"  id="parentescoUpdate" name="parentesco" value={{$grupofamilia->parentesco}}>

                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Hijo/Hija">Hijo/Hija</option>
                            <option value="Hijo/Hija">Hermano</option>

                         </select>
                        </div>
                      </div>

                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                          <label>Dni</label>
                          <input type="text" class="form-control" placeholder="Enter ..." id="dniUpdate" name="dni" value={{$grupofamilia->dni}}>
                        </div>
                    </div>
                </div>


                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
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

@endsection

<!-- FIN Modal Actualizar Contacto-->


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
