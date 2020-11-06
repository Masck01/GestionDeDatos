@extends('layouts.app')
@section('content')
@php
    $s = '';
@endphp

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
          
          <h3 class="card-title">Editar Cliente</h3>
      
      </div>

      <div class="card-body">
              
        <form method="post" action="{{ route('clientes.update',$cliente->id)}}" role="form">
                
          {{ csrf_field() }}
          
          {{ method_field('PUT') }}

          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
                <div class="form-group">
                  
                  <label>Nombre Fantasia</label>
                  
                  <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre" value="{{$cliente->nombre_Fantasia}}">
                  
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                
                <div class="form-group">
                    
                    <label>Género</label>
                      
                    <select class="form-control select2" style="width: 100%;" id="genero" name="genero">
                      <option value="{{$cliente->genero}}">{{$cliente->genero}}</option>
                      <option value="Otro">Otro</option>
                      <option value="Femenino">Femenino</option>
                      <option value="Masculino">Masculino</option>
                    </select>
                
                </div>
            
            </div>
            
            
          </div>

          <div class="row">
              
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                
                <div class="form-group">
                  
                  <label>CUIT / CUIL</label>
                  
                  <input type="text" class="form-control" placeholder="Enter ..." id="cuit_cuil" name="cuit_cuil" value="{{$cliente->cuit_cuil}}">
                
                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                
                <div class="form-group">
                  
                  <label>Tel&eacute;fonos</label>
                  
                  <input type="text" class="form-control" placeholder="Enter ..." id="telefonos" name="telefonos" value="{{$cliente->telefonos}}">
                
                </div>
            
            </div>
            
          </div>

          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                
                <div class="form-group">
                    
                  <label>E-mail</label>
                  
                  <input type="text" class="form-control" placeholder="Enter ..." id="email" name="email" value="{{$cliente->email}}">
                
                </div>
            
            </div>
                        
          </div>

          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
              <div class="form-group">
                
                <label>Direcci&oacute;n</label>
                
                <input type="text" class="form-control" placeholder="Enter ..." id="direccion" name="direccion" value="{{$cliente->direccion}}">
              
              </div>
            
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                  
              <div class="form-group">
                  
                <label>C.P.</label>
                  
                <input type="text" class="form-control" placeholder="Enter ..." id="codigo_postal" name="codigo_postal" value="{{$cliente->codigo_postal}}">
                
              </div>

            </div>
        
          </div>

          <div class="row">
              
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                
              <div class="form-group">
                
                <label>Ciudad</label>
                
                <input type="text" class="form-control" placeholder="Enter ..." id="ciudad" name="ciudad" value="{{$cliente->ciudad}}">
              
              </div>
            
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
              <div class="form-group">
                
                <label>Provincia</label>
                
                <select class="form-control select2" style="width: 100%;" id="provincia_id" name="provincia_id">
                  
                <option value="{{$cliente->provincia->id}}">{{$cliente->provincia->nombre}}</option>
                    
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
                
                <button type="submit" class="btn btn-success"> Actualizar <i class="fas fa-pencil-alt" style="color:#E8EE10"></i> </button>
                
                <a class="btn btn-danger" href="{{ route('clientes.index')}}" role="button">Cancelar <i class="fas fa-arrow-alt-circle-left" style="color:#E8EE10"></i></a>
                
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
