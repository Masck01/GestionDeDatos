@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Unidades de Negocio</h1>
                </div>

              </div>
            </div><!-- /.container-fluid -->
          </section>

 

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Agregar Unidad de Negocio</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('unidadnegocio.store')}}" role="form">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>CUIT</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="cuit" name="cuit">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Tel&eacute;fonos</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefonos" name="telefonos">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Direcci&oacute;n</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="direccion" name="direccion">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>C.P.</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="codigo_postal" name="codigo_postal">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Ciudad</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="ciudad" name="ciudad">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Provincia</label>
                      <select class="form-control select2" style="width: 100%;" id="provincia_id" name="provincia_id">
                        <option value="0">Seleccione una Provincia</option>
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
