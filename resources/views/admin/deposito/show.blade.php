@extends('layouts.app')
@section('content')

<div class="container">
  
  <div class="row justify-content-center">
    
    <div class="col-md-12">

      <div class="card card-secondary">
        
        <div class="card-header">

          <h3 class="card-title">{{$deposito->razon_social}}</h3>
        
        </div>

        <div class="card-body">
        
          <div class="row">
            
            <div class="col-md-12">
              <p><b>Razon social: </b>{{$deposito->razon_social}}</p>
              <p><b>Telefono: </b>{{$deposito->telefono}}</p>
              <p><b>Direccion: </b>{{$deposito->direccion}}</p>
              <p><b>Cuit: </b>{{$deposito->cuit}}</p>
              <p><b>Estado: </b>{{$deposito->estado}}</p>
             

            </div>

          </div>
        
        </div>
      
      </div>

    </div>

  </div>

</div>

@endsection

