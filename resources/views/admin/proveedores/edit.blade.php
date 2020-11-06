@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Actualizar Proveedor</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form method="post" action="{{ route('proveedores.update', $proveedor->id)}}"  enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Razon Social</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="razonSocial" name="razonSocial" value="{{$proveedor->razon_Social}}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>CUIT / CUIL</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="cuit_cuil" name="cuit_cuil" value="{{$proveedor->cuit_cuil}}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tel&eacute;fonos</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefonos" name="telefonos" value="{{$proveedor->telefonos}}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Direcci&oacute;n</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="direccion" name="direccion" value="{{$proveedor->direccion}}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>C.P.</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="codigo_postal" name="codigo_postal" value="{{$proveedor->codigo_postal}}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Ciudad</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="ciudad" name="ciudad" value="{{$proveedor->ciudad}}">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Provincia</label>
                      <select class="form-control select2" style="width: 100%;" id="provincia_id" name="provincia_id">
                        <option value="{{$proveedor->provincia->id}}">{{$proveedor->provincia->nombre}}</option>
                        @foreach($provincias as $provincia)
                        <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                        @endforeach
                      </select>
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

