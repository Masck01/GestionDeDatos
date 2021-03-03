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
                      <input type="text" class="form-control" placeholder="Enter ..." id="razon_social" name="razon_social" value="{{$proveedor->razon_social}}">
                    </div>
                  </div>


                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>CUIT</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="cuit" name="cuit" value="{{$proveedor->cuit}}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Telefono</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="telefono" name="telefono" value="{{$proveedor->telefono}}">
                    </div>
                  </div>


                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Estado</label>

                      <select class="form-control select2" style="width: 100%;" id="estado" name="estado">
                        <option value="{{$proveedor->estado}}">{{$proveedor->estado}}</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
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

