@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Actualizar Empleado</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('empleados.update',$empleado->id)}}" role="form">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre" value="{{$empleado->nombre}}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="apellido" name="apellido"  value="{{$empleado->apellido}}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tel&eacute;fono Celular</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefono_celular" name="telefono_celular"  value="{{$empleado->telefono_celular}}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tel&eacute;fono Fijo</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefono_fijo" name="telefono_fijo"  value="{{$empleado->telefono_fijo}}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="email" name="email"  value="{{$empleado->email}}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Domicilio</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="domicilio" name="domicilio"  value="{{$empleado->domicilio}}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Cuil/Cuit</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="email" name="cuit_cuil"  value="{{$empleado->cuit}}">
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
                      <div class="form-group">
                        
                          <label>Categoria</label>

                          <select class="form-control select2" style="width: 100%;" id="categoria" name="categoria">
                          
                              <option value="{{$empleado->categorias->id}}">{{$empleado->categorias->descripcion}}</option>
                              
                              @foreach ($categorias as $categoria)
                              
                              <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>

                              @endforeach

                          </select>
                          
                        </div>

                  </div>
                
                  </div>

                <div class="row">
                
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Cuenta Bancaria</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="cuenta" name="cuenta" value="{{$empleado->cuenta}}">
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Fecha de Ingreso</label>
                      <input type="date" class="form-control" placeholder="Enter ..." id="ingreso" name="ingreso" value="{{$empleado->fechaIngreso}}">
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
            <!-- /.card-body -->
          </div>


        </div>
    </div>
</div>
@endsection