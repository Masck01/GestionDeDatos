@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Sucursal</h1>
                </div>

              </div>
            </div><!-- /.container-fluid -->
          </section>



          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Agregar Sucursal</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('depositos.store')}}" role="form">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Razon social</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="razon_social" name="razon_social">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" class="form-control" placeholder="Enter ..." id="telefono" name="telefono">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>Direccion</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="direccion" name="direccion">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                      <label>cuit</label>
                      <input type="text" class="form-control" placeholder="Enter ..." id="cuit" name="cuit">
                    </div>
                  </div>
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
