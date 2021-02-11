@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Agregar Empleado</h3>
            </div>
            <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('empleados.store')}}" role="form">
                {{ csrf_field() }}

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="apellido" name="apellido">
                    </div>
                  </div>
                </div>

               <!--  <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Empleado</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="username" name="username">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Contrase&ntilde;a</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="password" name="password">
                    </div>
                  </div>
                </div> -->

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tel&eacute;fono Celular</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefono_celular" name="telefono_celular">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tel&eacute;fono Fijo</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefono_fijo" name="telefono_fijo">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="email" name="email">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Domicilio</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="domicilio" name="domicilio">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Cuit</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="cuit" name="cuit">
                    </div>
                  </div>
                
                
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                
                    <label>Categoria</label>

                    <select class="form-control select2" style="width: 100%;" id="categoria" name="categoria">
                
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
                    <label>Caja de Ahorro</label>

                    <select class="form-control select2" style="width: 100%;" id="cajadeahorro" name="cajadeahorro">
                
                      @foreach ($cajasdeahorro as $cajadeahorro)
                    
                      <option value="{{$cajadeahorro->id}}">{{$cajadeahorro->codigo}}</option>

                      @endforeach

                    </select>
                  </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
                    <div class="form-group">
                    <label>Sucursal</label>

                    <select class="form-control select2" style="width: 100%;" id="sucursal" name="sucursal">
                
                     @foreach ($sucursales as $sucursal)
                    
                      <option value="{{$sucursal->id}}">{{$sucursal->razon_social}}</option>

                      @endforeach

                    </select>
                  </div>
                  </div>
                </div> 

                <div class="row">
                
                
               
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Fecha de Ingreso</label>
                      <input type="date" class="form-control" placeholder="Enter ..." id="ingreso" name="ingreso">
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
            <!-- /.card-body -->
          </div>


        </div>
    </div>
</div>
@endsection
