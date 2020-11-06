@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

          <section class="content-header">

            <div class="container-fluid">

              <div class="row mb-2">

                <div class="col-sm-6">

                  <h1>Clientes</h1>

                </div>

              </div>

            </div>
            
          </section>

          <div class="card card-secondary">

            <div class="card-header">
              
              <h3 class="card-title">Detalle de Cliente</h3>
            
            </div>

            <div class="card-body">

              <div class="row">
                
                <div class="col-md-12">
                  <br>
                    <p><b>Nombre </b>{{$cliente->nombre_Fantasia}}</p>
                    <p><b>Tel&eacute;fono: </b>{{$cliente->telefonos}}</p>
                    <p><b>E-Mail: </b>{{$cliente->email}}</p>
                    <p><b>Domicilio: </b>{{$cliente->direccion}}</p>
                    <p><b>Ciudad: </b>{{$cliente->ciudad}}</p>
                    <p><b>Provincia: </b>{{$cliente->provincia->nombre}}</p>
                </div>

              </div>

            </div>

          </div>
    
        </div>

        </div>
        
        <div class="form-group">
        		
            <a class="btn btn-danger" href="{{ route('clientes.index')}}" role="button">Volver </a>
        
        </div>
      
      </div>
        
  </div>

</div>

@endsection
