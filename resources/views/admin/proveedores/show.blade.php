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
                  <p><b>Razon Social </b>{{$proveedor->razon_Social}}</p>
                  <p><b>CUIT / CUIL: </b>{{$proveedor->cuit_cuil}}</p>
                  <p><b>Tel&eacute;fonos: </b>{{$proveedor->telefonos}}</p>
                  <p><b>Direcci&oacute;n: </b>{{$proveedor->direccion}}</p>
                  <p><b>Ciudad: </b>{{$proveedor->ciudad}}</p>
                  <p><b>C.P.: </b>{{$proveedor->codigo_postal}}</p>
                  <p><b>Provincia: </b>{{$proveedor->provincia->nombre}}</p>
                  
                </div>
              </div>
            </div>
          </div>


        </div>
    </div>
</div>

@endsection
