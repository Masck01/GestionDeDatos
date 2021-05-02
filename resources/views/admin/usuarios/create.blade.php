@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Agregar Usuario</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('usuarios.store')}}" role="form">
                {{ csrf_field() }}

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Usuario</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="username" name="username">
                    </div>
                  </div>



                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="password" >{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="row">


                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="email" >{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                                <div class="form-group">


                                      <label>Tipo Usuario</label>

                                      <select class="form-control select2" style="width: 100%;" id="tipousuario" name="tipousuario">
                                        <option value="usuario">usuario</option>
                                        <option value="admin">admin</option>
                                        <option value="recursoshumanos">recursoshumanos</option>
                                        <option value="ventas">ventas</option>
                                      </select>
                                </div>
                </div>



            </div>



              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                <div class="form-group">

                <label>Empleado</label>

                    <select class="form-control select2" style="width: 100%;" id="empleado" name="empleado">

                     @foreach ($empleados as $empleado)

                      <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>

                      @endforeach

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
            <!-- /.card-body -->
          </div>


        </div>
    </div>
</div>
@endsection
