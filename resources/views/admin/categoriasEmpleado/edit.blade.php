@extends('layouts.app')
@section('content')

<div class="container">
  
  <div class="row justify-content-center">
    
    <div class="col-md-12">
    
      <section class="content-header">
        
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <div class="col-sm-6">

              <h1>Categorias Empleados</h1>

            </div>

          </div>
        
        </div>
      
      </section>

    <div class="card card-secondary">
      
      <div class="card-header">
          
          <h3 class="card-title">Editar Categoria</h3>
      
      </div>

      <div class="card-body">
              
        <form method="post" action="{{ route('categoriasEmpleados.update',$categorias->id)}}" role="form">
                  
          {{ csrf_field() }}

          {{ method_field('PUT') }}
          
          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              
                <div class="form-group">
                  
                  <label>Nombre</label>
                  
                  <input type="text" class="form-control" placeholder="Enter ..." id="nombre" name="nombre" value="{{$categorias->nombre}}">
                  
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                
                <div class="form-group">
                    
                    <label>Estado</label>
                      
                    <select class="form-control select2" style="width: 100%;" id="estado" name="estado">
                      <option value="{{$categorias->estado}}">{{$categorias->estado}}</option>
                      <option value="Activo">Activo</option>
                      <option value="Inactivo">Inactivo</option>
                    </select>
                
                </div>
            
            </div>
            

          
          </div>

          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              
              <div class="form-group">
                
                <button type="submit" class="btn btn-primary"> Agregar  </button>
              
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

