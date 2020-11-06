@extends('layouts.app')
@section('content')

<div class="container">
  
  <div class="row justify-content-center">
    
    <div class="col-md-12">

      <div class="card card-secondary">
        
        <div class="card-header">

          <h3 class="card-title">{{$deposito->nombre}}</h3>
        
        </div>

        <div class="card-body">
        
          <div class="row">
            
            <div class="col-md-12">
              
              <p><b>Telefono: </b>{{$deposito->telefonos}}</p>
              <p><b>Direccion: </b>{{$deposito->direccion}}</p>
              <p><b>Ciudad: </b>{{$deposito->ciudad}}</p>
              <p><b>C.P: </b>{{$deposito->codigo_postal}}</p>
              <p><b>Provincia: </b>{{$deposito->provincia->nombre}}</p>

            </div>

          </div>
        
        </div>
      
      </div>

    </div>

  </div>

</div>

@endsection

