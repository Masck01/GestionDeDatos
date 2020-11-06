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
              <h3 class="card-title">Detalle de Unidad de Negocio</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <p><b>Nombre: </b>{{$unidadnegocio->nombre}}</p>
                  <p><b>CUIT: </b>{{$unidadnegocio->cuit}}</p>
                  <p><b>Tel&eacute;fonos: </b>{{$unidadnegocio->telefonos}}</p>
                  <p><b>Direcci&oacute;n: </b>{{$unidadnegocio->direccion}}</p>
                  <p><b>Ciudad: </b>{{$unidadnegocio->ciudad}}</p>
                  <p><b>C.P.: </b>{{$unidadnegocio->codigo_postal}}</p>
                  <p><b>Provincia: </b>{{$unidadnegocio->provincia->nombre}}</p>
                </div>
              </div>



            </div>
            <!-- /.card-body -->
          </div>


        </div>
    </div>
</div>
@endsection
