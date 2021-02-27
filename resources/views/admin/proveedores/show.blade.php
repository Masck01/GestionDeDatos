@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Detalle de Proveedor</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <p><b>Razon Social </b>{{$proveedor->razon_social}}</p>
                  <p><b>CUIT: </b>{{$proveedor->cuit}}</p>
                  <p><b>Teléfono: </b>{{$proveedor->telefono}}</p>
                  <p><b>Estado: </b>{{$proveedor->estado}}</p>

                </div>
              </div>
            </div>
          </div>


        </div>
    </div>
</div>

@endsection
